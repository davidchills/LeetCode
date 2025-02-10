<?php
class Solution {

    /**
     * 76. Minimum Window Substring
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t) {
        if (strlen($t) > strlen($s)) return ""; // If $t is longer than $s, no valid substring exists.
    
        // Step 1: Build frequency map for $t
        $tFreq = array_count_values(str_split($t));
        $required = count($tFreq); // Number of unique characters in $t
        $windowFreq = []; // Frequency map for the current window
        $formed = 0; // Number of unique characters in $t satisfied in the window
    
        $left = 0; // Left pointer of the window
        $right = 0; // Right pointer of the window
        $minLength = PHP_INT_MAX; // Minimum length of the substring
        $result = ""; // Result substring
    
        while ($right < strlen($s)) {
            // Step 2: Expand the window by adding the character at $right
            $char = $s[$right];
            if (isset($windowFreq[$char])) { $windowFreq[$char]++; } 
            else { $windowFreq[$char] = 1; }
    
            // If the character count in the window matches $tFreq, it's satisfied
            if (isset($tFreq[$char]) && $windowFreq[$char] === $tFreq[$char]) {
                $formed++;
            }
    
            // Step 3: Contract the window while all characters are satisfied
            while ($formed === $required) {
                // Update the result if this window is smaller than the previous best
                $windowLength = $right - $left + 1;
                if ($windowLength < $minLength) {
                    $minLength = $windowLength;
                    $result = substr($s, $left, $windowLength);
                }
    
                // Remove the character at $left and contract the window
                $leftChar = $s[$left];
                $windowFreq[$leftChar]--;
                if (isset($tFreq[$leftChar]) && $windowFreq[$leftChar] < $tFreq[$leftChar]) {
                    $formed--; // No longer satisfies $tFreq
                }
                $left++; // Move the left pointer
            }
    
            // Step 4: Expand the window
            $right++;
        }
    
        return $result; // Return the shortest substring found
    }
}

$c = new Solution;
//print_r($c->minWindow("ADOBECODEBANC", "ABC")); // Expect "BANC"
//print_r($c->minWindow("a", "a")); // Expect "a"
print_r($c->minWindow("a", "aa")); // Expect ""

?>