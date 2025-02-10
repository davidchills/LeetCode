<?php
class Solution {

    /**
     * 13. Roman to Integer
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $romanKeys = array('I' => 1, 'V' => 5, 'X' => 10, 'L' => 50, 'C' => 100, 'D' => 500, 'M' => 1000);
        $romanValues = array_flip($romanKeys);
        $digits = str_split($s);
        $kount = count($digits);
        $out = 0;
        for ($i = $kount - 1; $i >= 0; $i--) {
            $out += $romanKeys[$digits[$i]];
            if ($i > 0) {
                if ($digits[$i-1] === 'I' && ($digits[$i] === 'V' || $digits[$i] === 'X')) {
                    $out -= 1;
                    $i--;
                }
                if ($digits[$i-1] === 'X' && ($digits[$i] === 'L' || $digits[$i] === 'C')) {
                    $out -= 10;
                    $i--;
                } 
                if ($digits[$i-1] === 'C' && ($digits[$i] === 'D' || $digits[$i] === 'M')) {
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