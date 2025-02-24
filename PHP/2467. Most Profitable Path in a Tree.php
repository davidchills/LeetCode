<?php
/*
There is an undirected tree with n nodes labeled from 0 to n - 1, rooted at node 0. You are given a 2D integer array edges of length n - 1 where edges[i] = [ai, bi] indicates that there is an edge between nodes ai and bi in the tree.

At every node i, there is a gate. You are also given an array of even integers amount, where amount[i] represents:

the price needed to open the gate at node i, if amount[i] is negative, or,
the cash reward obtained on opening the gate at node i, otherwise.
The game goes on as follows:

Initially, Alice is at node 0 and Bob is at node bob.
At every second, Alice and Bob each move to an adjacent node. Alice moves towards some leaf node, while Bob moves towards node 0.
For every node along their path, Alice and Bob either spend money to open the gate at that node, or accept the reward. Note that:
If the gate is already open, no price will be required, nor will there be any cash reward.
If Alice and Bob reach the node simultaneously, they share the price/reward for opening the gate there. In other words, if the price to open the gate is c, then both Alice and Bob pay c / 2 each. Similarly, if the reward at the gate is c, both of them receive c / 2 each.
If Alice reaches a leaf node, she stops moving. Similarly, if Bob reaches node 0, he stops moving. Note that these events are independent of each other.
Return the maximum net income Alice can have if she travels towards the optimal leaf node.
*/
class Solution {

    /**
     * 2467. Most Profitable Path in a Tree
     * @param Integer[][] $edges
     * @param Integer $bob
     * @param Integer[] $amount
     * @return Integer
     */
    public function mostProfitablePath(array $edges, int $bob, array $amount) {
        $n = count($amount);
        
        // Build adjacency list for tree
        $graph = array_fill(0, $n, []);
        foreach ($edges as $edge) {
            $graph[$edge[0]][] = $edge[1];
            $graph[$edge[1]][] = $edge[0];
        }
    
        // Find the path Bob takes from bob to root (0)
        $bobPath = array_fill(0, $n, -1);
        $this->findBobPath($graph, $bob, -1, 0, $bobPath);
        
        // DFS to find max profit Alice can make
        return $this->dfs($graph, 0, -1, 0, 0, $bobPath, $amount);        
    }
    
    private function findBobPath(array &$graph, int $node, int $parent, int $depth, array &$bobPath): bool {
        $bobPath[$node] = $depth;
        if ($node === 0) { return true; }
        
        foreach ($graph[$node] as $neighbor) {
            if ($neighbor != $parent && $this->findBobPath($graph, $neighbor, $node, $depth + 1, $bobPath)) {
                return true;
            }
        }
        
        $bobPath[$node] = -1; // Reset if not on path
        return false;
    }
    
    private function dfs(array &$graph, int $node, int $parent, int $time, int $income, array &$bobPath, array  &$amount): int {
        // Calculate actual amount Alice receives at this node
        if ($bobPath[$node] === -1 || $time < $bobPath[$node]) {
            // Alice beats Bob to this node. Alice takes full amount
            $income += $amount[$node];
        } 
        elseif ($time === $bobPath[$node]) {
            // Bob and Alice arrive at this node at the same time. Split reward.
            $income += $amount[$node] / 2;
        }
        
        // Leaf node condition
        if (count($graph[$node]) === 1 && $graph[$node][0] === $parent) {
            return $income;
        }
    
        // Explore child nodes and get max profit
        $maxProfit = PHP_INT_MIN;
        foreach ($graph[$node] as $neighbor) {
            if ($neighbor !== $parent) {
                $maxProfit = max($maxProfit, $this->dfs($graph, $neighbor, $node, $time + 1, $income, $bobPath, $amount));
            }
        }
        
        return $maxProfit;
    }    
}

$c = new Solution;
/*
$edges = [[0,1],[1,2],[1,3],[3,4]];
$bob = 3;
$amount = [-2,4,2,-4,6];
// Expect 6
*/

$edges = [[0,1]];
$bob = 1;
$amount = [-7280,2350];
// Expect -7280

print_r($c->mostProfitablePath($edges, $bob, $amount));
?>