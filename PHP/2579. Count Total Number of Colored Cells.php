<?php
/*
There exists an infinitely large two-dimensional grid of uncolored unit cells. 
    You are given a positive integer n, indicating that you must do the following routine for n minutes:
At the first minute, color any arbitrary unit cell blue.
Every minute thereafter, color blue every uncolored cell that touches a blue cell.
    Return the number of colored cells at the end of n minutes.
*/
class Solution {

    /**
     * 2579. Count Total Number of Colored Cells
     * @param Integer $n
     * @return Integer
     */
    function coloredCells($n) {
        if ($n === 1) { return 1; }
        return pow($n, 2) + pow(($n - 1), 2);
    }
}

$c = new Solution;
//print_r($c->coloredCells(1)); // Expect 1
//print_r($c->coloredCells(2)); // Expect 5
print_r($c->coloredCells(3)); // Expect 13
?>