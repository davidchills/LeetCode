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
		$suffix = 1;
		$j = $length - 1;
		// One Pass.
		for ($i = 0; $i < $length; $i++) {
			$out[$i] *= $prefix;
			$prefix *= $nums[$i];
			$out[$j] *= $suffix;
			$suffix *= $nums[$j];;
			$j--;
		}
		return $out;
    }
}
$c = new Solution;
print_r($c->productExceptSelf([-1,1,0,-3,3]));
?>