<?php
class Solution {

    /**
     * 12. Integer to Roman
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {
        $outString = '';
        $map = array(1000 => 'M', 900 => 'CM', 500 => 'D', 400 => 'CD', 
            100 => 'C', 90 => 'XC', 50 => 'L', 40 => 'XL', 10 => 'X', 
            9 => 'IX', 5 => 'V', 4 => 'IV', 1 => 'I');
        
        foreach ($map as $number => $letter) {
            while ($num >= $number) {
                $outString .= $letter;
                $num -= $number;
            }
        }
        return $outString;
    }
}

$c = new Solution;
print_r($c->intToRoman(58));
?>