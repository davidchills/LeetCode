<?php
/*
You are given a 0-indexed string blocks of length n, where blocks[i] is either 'W' or 'B', representing the color of the ith block. 
    The characters 'W' and 'B' denote the colors white and black, respectively.
You are also given an integer k, which is the desired number of consecutive black blocks.
In one operation, you can recolor a white block such that it becomes a black block.
Return the minimum number of operations needed such that there is at least one occurrence of k consecutive black blocks.
*/
class Solution {

    /**
     * 2379. Minimum Recolors to Get K Consecutive Black Blocks
     * @param String $blocks
     * @param Integer $k
     * @return Integer
     */
    function minimumRecolors($blocks, $k) {
        $n = strlen($blocks);
        $minOperations = PHP_INT_MAX;
    
        // Count 'B's in the first window of size k
        $currentBlackCount = 0;
        for ($i = 0; $i < $k; $i++) {
            if ($blocks[$i] === 'B') {
                $currentBlackCount++;
            }
        }
    
        // Calculate minimum operations for this first window
        $minOperations = $k - $currentBlackCount;
    
        // Slide the window across the string
        for ($i = $k; $i < $n; $i++) {
            // Remove the leftmost character from the window count
            if ($blocks[$i - $k] === 'B') {
                $currentBlackCount--;
            }
    
            // Add the new rightmost character to the window count
            if ($blocks[$i] === 'B') {
                $currentBlackCount++;
            }
    
            // Update the minimum operations needed
            $minOperations = min($minOperations, $k - $currentBlackCount);
        }
    
        return $minOperations;
    }
}

$c = new Solution;
//print_r($c->minimumRecolors("WBBWWBBWBW", 7)); // Expect 3
print_r($c->minimumRecolors("WBWBBBW", 2)); // Expect 0
?>