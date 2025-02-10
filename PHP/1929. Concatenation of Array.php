<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function getConcatenation($nums) {
        $length = count($nums);
		$index2 = $length;
		$nums2 = $nums;
		for ($i = 0; $i < $length; $i++) {
			$nums2[$index2 + $i] = $nums[$i];
		}
		return $nums2;
    }
}
$s = new Solution();
print_r($s->getConcatenation([1,3,2,1]));
?>