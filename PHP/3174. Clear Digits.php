<?php
class Solution {

    /**
     * 3174. Clear Digits
     * @param String $s
     * @return String
     */
    function clearDigits($s) {
        $nonDigits = [];
        $alphaKey = array_flip(range('a','z'));
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($alphaKey[$s[$i]])) {
                $nonDigits[] = $s[$i];
            }
            else { array_pop($nonDigits); }
        }
        return implode('',$nonDigits);
    }
}

$c = new Solution;
//print_r($c->clearDigits("abc")); // Expect "abc"
print_r($c->clearDigits("cb34")); // Expect ""
?>