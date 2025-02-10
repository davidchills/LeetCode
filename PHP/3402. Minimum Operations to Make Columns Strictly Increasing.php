<?php
class Solution {

    /**
     * 3402. Minimum Operations to Make Columns Strictly Increasing
     * @param Integer[][] $grid
     * @return Integer
     */
    function minimumOperations($grid) {
        $rows = count($grid);
        $columns = count($grid[0]);
        $operations = 0;
        for ($r = 0; $r < $rows - 1; $r++) {
            for ($c = 0; $c < $columns; $c++) {
                $diff = ($grid[$r][$c] - $grid[$r+1][$c]);
                if ($diff > -1) {
                    $diff++;
                    $operations += $diff;
                    $grid[$r+1][$c] += $diff;
                }
            }
        }
        return $operations;
    }
}

$c = new Solution;
print_r($c->minimumOperations([[3,2],[1,3],[3,4],[0,1]])); // Expect 15
//print_r($c->minimumOperations([[3,2,1],[2,1,0],[1,2,3]])); // Expect 12
?>