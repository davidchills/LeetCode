<?php
class Solution {

    /**
     * 827. Making A Large Island
     * @param Integer[][] $grid
     * @return Integer
     */
    function largestIsland($grid) {
        $n = count($grid);
        $index = 2; // Start marking islands from index 2 to differentiate them from default 1s
        $area = [];
        $directions = [[0,1], [1,0], [0,-1], [-1,0]];

        // Step 1: Identify all islands and store their sizes
        for ($r = 0; $r < $n; $r++) {
            for ($c = 0; $c < $n; $c++) {
                if ($grid[$r][$c] == 1) {
                    $area[$index] = $this->dfs($grid, $r, $c, $index, $area, $n);
                    $index++;
                }
            }
        }

        // Step 2: Find the maximum island size if we flip a 0 to 1
        $maxIsland = !empty($area) ? max($area) : 0; // Get max of found islands or 0 if no island exists

        for ($r = 0; $r < $n; $r++) {
            for ($c = 0; $c < $n; $c++) {
                if ($grid[$r][$c] == 0) {
                    $seen = [];
                    $newSize = 1; // Start with 1 since we are converting this 0 into a 1
                    foreach ($directions as $dir) {
                        $nr = $r + $dir[0];
                        $nc = $c + $dir[1];
                        if ($nr >= 0 && $nc >= 0 && $nr < $n && $nc < $n && $grid[$nr][$nc] > 1) {
                            $id = $grid[$nr][$nc];
                            if (!isset($seen[$id])) {
                                $newSize += $area[$id];
                                $seen[$id] = true;
                            }
                        }
                    }
                    $maxIsland = max($maxIsland, $newSize);
                }
            }
        }

        return $maxIsland;
    }   
    
    // DFS to compute island size
    private function dfs(&$grid, $r, $c, $index, &$area, $n) {
        if ($r < 0 || $c < 0 || $r >= $n || $c >= $n || $grid[$r][$c] != 1) {
            return 0;
        }
        $grid[$r][$c] = $index;
        $size = 1;
        foreach ([[0,1], [1,0], [0,-1], [-1,0]] as $dir) {
            $size += $this->dfs($grid, $r + $dir[0], $c + $dir[1], $index, $area, $n);
        }
        return $size;
    }    
}

$c = new Solution;
//print_r($c->largestIsland([[1,0],[0,1]])); // Expect 3
//print_r($c->largestIsland([[1,1],[1,0]])); // Expect 4
//print_r($c->largestIsland([[1,1],[1,1]])); // Expect 4
print_r($c->largestIsland([[0,0],[0,0]])); // Expect 0
?>