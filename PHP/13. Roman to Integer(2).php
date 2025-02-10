<?php
class Solution {

    /**
     * 13. Roman to Integer
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $romanKeys = array('I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000);
        $letters = str_split($s);
        $kount = count($letters);
        $out = 0;
        // Start at the end and go forward.
        for ($i = $kount - 1; $i >= 0; $i--) {
            $letter = $letters[$i];
            // Add the matching amount.
            $out += $romanKeys[$letter];
            // If there is a previous letter, check for subtraction.
            if ($i > 0) {
                $prevLetter = $letters[$i-1];
                // Subtract values of there related prefix letters.
                if ($prevLetter === 'I' && in_array($letter, ['V','X'])) {
                    $out -= 1;
                    $i--;
                }
                if ($prevLetter === 'X' && in_array($letter, ['L','C'])) {
                    $out -= 10;
                    $i--;
                } 
                if ($prevLetter === 'C' && in_array($letter, ['D','M'])) {
                    $out -= 100;
                    $i--;
                }                 
            }
        }
        return $out;
    }
}

$c = new Solution;
print_r($c->romanToInt("MCMXCIV"));
// "III" = 3
// "LVIII" = 58
// "MCMXCIV" = 1994
?>