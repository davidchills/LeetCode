<?php
class Solution {

    /**
     * 3417. Zigzag Grid Traversal With Skip
     * @param Integer[][] $grid
     * @return Integer[]
     */
    function zigzagTraversal($grid) {
        $left = 0;
        $right = count($grid[0]) - 1;
        $top = 0;
        $bottom = count($grid) - 1;
        $out = [];
        $skip = false;
        while ($top <= $bottom) {
            for ($i = $left; $i <= $right; $i++) {
                //if (($i + $top) % 2 !== 0) { continue; }
                if ($skip === true) { $skip = false; continue; }
                $out[] = $grid[$top][$i];
                $skip = true;
            }
            $top++;   
            if ($top > $bottom) { continue; }
            for ($i = $right; $i >= $left; $i--) {
                //if (($i + $top) % 2 !== 0) { continue; }
                if ($skip === true) { $skip = false; continue; }
                $out[] = $grid[$top][$i];
                $skip = true;
            }
            $top++;
        }
        return $out;
    }
}

$c = new Solution;
//print_r($c->zigzagTraversal([[1,2],[3,4]])); // Expect [1,4]
//print_r($c->zigzagTraversal([[2,1],[2,1],[2,1]])); // Expect [2,1,2]
//print_r($c->zigzagTraversal([[1,2,3],[4,5,6],[7,8,9]])); // Expect [1,3,5,7,9]
print_r($c->zigzagTraversal([[1,2,3,4,5],[6,7,8,9,10],[11,12,13,14,15]])); // Expect [1,3,5,9,7,11,13,15]
//print_r($c->zigzagTraversal([[1,2,3]])); // Expect [1,3]    
?>