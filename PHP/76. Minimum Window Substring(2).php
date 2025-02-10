<?php
class Solution {

    /**
     * 76. Minimum Window Substring
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t) {
        $m = strlen($s);
        $n = strlen($t);
    
        // Base case: If t is longer than s, no window is possible
        if ($n > $m) { return ""; }
    
        // Step 1: Create frequency map for characters in t
        $tCount = array_fill(0, 128, 0);
        foreach (str_split($t) as $char) {
            $tCount[ord($char)]++;
        }
    
        // Step 2: Sliding window
        $left = 0;
        $start = 0;
        $minLength = PHP_INT_MAX;
        $required = $n; // Number of characters needed to form t
    
        for ($right = 0; $right < $m; $right++) {
            $current = ord($s[$right]);
    
            // If the character is in `t`, reduce `required`
            if ($tCount[$current] > 0) {
                $required--;
            }
    
            // Decrease its count in the map (can go negative for extra characters in `s`)
            $tCount[$current]--;
    
            // When we have a valid window
            while ($required === 0) {
                // Check if the current window is the smallest
                if ($right - $left + 1 < $minLength) {
                    $minLength = $right - $left + 1;
                    $start = $left;
                }
    
                // Shrink the window from the left
                $leftChar = ord($s[$left]);
                $tCount[$leftChar]++;
    
                // If removing this character makes the window invalid
                if ($tCount[$leftChar] > 0) {
                    $required++;
                }
    
                $left++;
            }
        }
    
        // Return the minimum window substring or empty string if no valid window exists
        return $minLength === PHP_INT_MAX ? "" : substr($s, $start, $minLength);
    }
}

$c = new Solution;
print_r($c->minWindow("ADOBECODEBANC", "ABC")); // Expect "BANC"
//print_r($c->minWindow("a", "a")); // Expect "a"
//print_r($c->minWindow("a", "aa")); // Expect ""

?>