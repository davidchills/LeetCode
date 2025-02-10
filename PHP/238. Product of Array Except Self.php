<?php
// 238. Product of Array Except Self
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) {
		$length = count($nums);
        $out = array_fill(0, $length, 1);
		$prefix = 1;
		// Forward pass.
		for ($i = 0; $i < $length; $i++) {
			$out[$i] = $prefix;
			$prefix *= $nums[$i];
		}
		// Reverse pass.
		$suffix = 1;
		for ($i = $length - 1; $i >= 0; $i--) {
			$out[$i] *= $suffix;
			$suffix *= $nums[$i];
		}
		return $out;
    }
}
$c = new Solution;
print_r($c->productExceptSelf([1,2,3,4]));
?>