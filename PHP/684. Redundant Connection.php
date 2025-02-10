<?php
class Solution {

    /**
     * 684. Redundant Connection
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function find($node, &$parent) {
        if ($parent[$node] !== $node) {
            $parent[$node] = $this->find($parent[$node], $parent); // Path compression
        }
        return $parent[$node];
    }
    
    function union($node1, $node2, &$parent, &$rank) {
        $root1 = $this->find($node1, $parent);
        $root2 = $this->find($node2, $parent);
    
        if ($root1 === $root2) {
            return false; // Cycle detected
        }
    
        // Union by rank
        if ($rank[$root1] > $rank[$root2]) {
            $parent[$root2] = $root1;
        } 
        elseif ($rank[$root1] < $rank[$root2]) {
            $parent[$root1] = $root2;
        } 
        else {
            $parent[$root2] = $root1;
            $rank[$root1]++;
        }
        return true;
    }
    
    function findRedundantConnection($edges) {
        $parent = [];
        $rank = [];
    
        // Initialize parent and rank arrays
        foreach ($edges as $edge) {
            list($u, $v) = $edge;
            if (!isset($parent[$u])) {
                $parent[$u] = $u;
                $rank[$u] = 0;
            }
            if (!isset($parent[$v])) {
                $parent[$v] = $v;
                $rank[$v] = 0;
            }
        }
    
        // Process edges
        foreach ($edges as $edge) {
            list($u, $v) = $edge;
            if (!$this->union($u, $v, $parent, $rank)) {
                return $edge; // Return the edge causing the cycle
            }
        }
    
        return [];
    }
}

$c = new Solution;
//print_r($c->findRedundantConnection([[1,2],[1,3],[2,3]])); // Expect [2,3]
print_r($c->findRedundantConnection([[1,2],[2,3],[3,4],[1,4],[1,5]])); // Expect [1,4]
?>