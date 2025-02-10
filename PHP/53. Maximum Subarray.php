<?php
class Solution {

    /**
     * 53. Maximum Subarray
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        if (empty($nums)) { return 0; }
		$currentSubarray = $nums[0];
		$maxSubarray = $nums[0];
		$length = count($nums);
		for ($i = 1; $i < $length; $i++) {
			$num = $nums[$i];
            $currentSubarray = max($num, ($currentSubarray + $num));
            $maxSubarray = max($maxSubarray, $currentSubarray);			
		}
		return $maxSubarray;        
    }
}

$c = new Solution;
//print_r($c->maxSubArray([-2,1,-3,4,-1,2,1,-5,4])); // Expect 6
//print_r($c->maxSubArray([5,4,-1,7,8])); // Expect 23
print_r($c->maxSubArray([1])); // Expect 1
?>