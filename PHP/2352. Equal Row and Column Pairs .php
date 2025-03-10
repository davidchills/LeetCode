<?php
/*
Given a 0-indexed n x n integer matrix grid, return the number of pairs (ri, cj) such that row ri and column cj are equal.
A row and column pair is considered equal if they contain the same elements in the same order (i.e., an equal array).
*/
class Solution {

    /**
     * 2352. Equal Row and Column Pairs
     * @param Integer[][] $grid
     * @return Integer
     */
    function equalPairs($grid) {
        $n = count($grid);
        $hash = [];
        $pairs = 0;
        
        for ($i = 0; $i < $n; $i++) {
            $row = implode(',', $grid[$i]);
            if (isset($hash[$row])) { $hash[$row]++; }
            else { $hash[$row] = 1; }
        }
        for ($j = 0; $j < $n; $j++) {
            $column = [];
            for ($i = 0; $i < $n; $i++) {
                $column[] = $grid[$i][$j];
            }
            $colKey = implode(',', $column);
            if (isset($hash[$colKey])) {
                $pairs += $hash[$colKey];
            }
        }

        return $pairs;
    }
}

$c = new Solution;
//print_r($c->equalPairs([[3,2,1],[1,7,6],[2,7,7]])); // Expect 1
print_r($c->equalPairs([[3,1,2,2],[1,4,4,5],[2,4,2,2],[2,4,2,2]])); // Expect 3
?>