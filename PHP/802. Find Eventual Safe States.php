<?php
class Solution {

    /**
     * 802. Find Eventual Safe States
     * @param Integer[][] $graph
     * @return Integer[]
     */
    function eventualSafeNodes($graph) {
        $n = count($graph);
    
        // Step 1: Reverse the graph and compute in-degrees
        $reversedGraph = array_fill(0, $n, []);
        $inDegree = array_fill(0, $n, 0);
    
        foreach ($graph as $node => $edges) {
            foreach ($edges as $neighbor) {
                $reversedGraph[$neighbor][] = $node;
                $inDegree[$node]++;
            }
        }

        // Step 2: Initialize the queue with terminal nodes (in-degree 0 nodes)
        $queue = [];
        for ($i = 0; $i < $n; $i++) {
            if ($inDegree[$i] == 0) { $queue[] = $i; }
        }
    
        // Step 3: Perform a BFS to find all safe nodes
        $safeNodes = [];
        while (!empty($queue)) {
            $node = array_shift($queue);
            $safeNodes[] = $node;
    
            foreach ($reversedGraph[$node] as $neighbor) {
                $inDegree[$neighbor]--;
                if ($inDegree[$neighbor] == 0) {
                    $queue[] = $neighbor;
                }
            }
        }
    
        // Step 4: Sort the result and return
        sort($safeNodes);
        return $safeNodes;        
    }
}

$c = new Solution;
//print_r($c->eventualSafeNodes([[1,2],[2,3],[5],[0],[5],[],[]])); // Expect [2,4,5,6]
print_r($c->eventualSafeNodes([[1,2,3,4],[1,2],[3,4],[0,4],[]])); // Expect [4]

?>