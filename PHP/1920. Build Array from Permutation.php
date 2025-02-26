<?php
/*
Given a zero-based permutation nums (0-indexed), build an array ans of the same length where 
    ans[i] = nums[nums[i]] for each 0 <= i < nums.length and return it.
A zero-based permutation nums is an array of distinct integers from 0 to nums.length - 1 (inclusive).
*/    
class Solution {

    /**
     * 1920. Build Array from Permutation
     * @param Integer[] $nums
     * @return Integer[]
     */
    function buildArray($nums) {
        /*
        $n - count($nums);
        $ans = [];
		for ($i = 0; $i < $n; $i++) {
			$ans[] = $nums[$nums[$i]];
		}
		return $ans;
        */
        $n = count($nums);
        // Encode new values in place
        for ($i = 0; $i < $n; $i++) {
            $nums[$i] += $n * ($nums[$nums[$i]] % $n);
        }
        // Decode values in place
        for ($i = 0; $i < $n; $i++) {
            $nums[$i] = (int)($nums[$i] / $n);
        }
        return $nums;
    }
}
$s = new Solution();
//print_r($s->buildArray([0,2,1,5,3,4])); // Expect [0,1,2,4,5,3]
print_r($s->buildArray([5,0,1,2,3,4])); // Expect [4,5,0,1,2,3]
?>