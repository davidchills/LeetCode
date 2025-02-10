<?php
class Solution {

    /**
     * 2658. Maximum Number of Fish in a Grid
     * @param Integer[][] $grid
     * @return Integer
     */
    function findMaxFish($grid) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $maxFish = 0;   
        
        for ($r = 0; $r < $rows; $r++) {
            for ($c = 0; $c < $cols; $c++) {
                if ($grid[$r][$c] > 0) { // Only start from water cells
                    $visited = array_fill(0, $rows, array_fill(0, $cols, false));
                    $maxFish = max($maxFish, $this->dfs($grid, $r, $c, $visited));
                }
            }
        }
    
        return $maxFish;        
    }
    
    private function dfs(&$grid, $r, $c, &$visited) {
        // If out of bounds, or already visited, or on a land cell, return 0
        if ($r < 0 || $c < 0 || $r >= count($grid) || $c >= count($grid[0]) || $visited[$r][$c] || $grid[$r][$c] === 0) {
            return 0;
        }

        $visited[$r][$c] = true; // Mark as visited
        $fishCaught = $grid[$r][$c];

        // Explore all adjacent cells
        $fishCaught += $this->dfs($grid, $r + 1, $c, $visited);
        $fishCaught += $this->dfs($grid, $r - 1, $c, $visited);
        $fishCaught += $this->dfs($grid, $r, $c + 1, $visited);
        $fishCaught += $this->dfs($grid, $r, $c - 1, $visited);

        return $fishCaught;
    }    
}

$c = new Solution;
//print_r($c->findMaxFish([[0,2,1,0],[4,0,0,3],[1,0,0,4],[0,3,2,0]])); // Expect 7
print_r($c->findMaxFish([[1,0,0,0],[0,0,0,0],[0,0,0,0],[0,0,0,1]])); // Expect 1
?>