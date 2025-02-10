<?php
class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function minimumSum($num) {
        $numbers = str_split((string) $num);
		sort($numbers);
		return intval($numbers[0].$numbers[2]) + intval($numbers[1].$numbers[3]);
    }
}
$s = new Solution();
print $s->minimumSum(4009);
?>