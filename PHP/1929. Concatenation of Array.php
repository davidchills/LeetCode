<?php
/*
Given an integer array nums of length n, you want to create an array ans of length 2n where ans[i] == nums[i] and ans[i + n] == nums[i] for 0 <= i < n (0-indexed).

Specifically, ans is the concatenation of two nums arrays.

Return the array ans.
*/
class Solution {

    /**
     * 1929. Concatenation of Array
     * @param Integer[] $nums
     * @return Integer[]
     */
    function getConcatenation($nums) {
        /*
        $length = count($nums);
		$index2 = $length;
		$nums2 = $nums;
		for ($i = 0; $i < $length; $i++) {
			$nums2[$index2 + $i] = $nums[$i];
		}
		return $nums2;   
        */
        return array_merge($nums, $nums);
    }
}

$c = new Solution;
print_r($c->getConcatenation([1,2,1])); // Expect [1,2,1,1,2,1]
//print_r($c->getConcatenation([1,3,2,1])); // Expect [1,3,2,1,1,3,2,1]
?>