<?php
/*
Given a circular integer array nums of length n, return the maximum possible sum of a non-empty subarray of nums.
A circular array means the end of the array connects to the beginning of the array. 
    Formally, the next element of nums[i] is nums[(i + 1) % n] and the previous element of nums[i] is nums[(i - 1 + n) % n].
A subarray may only include each element of the fixed buffer nums at most once. 
    Formally, for a subarray nums[i], nums[i + 1], ..., nums[j], there does not exist i <= k1, k2 <= j with k1 % n == k2 % n.
*/
class Solution {

    /**
     * 918. Maximum Sum Circular Subarray
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubarraySumCircular($nums) {
        $n = count($nums);
        $total = $nums[0];
        $maxSum = $nums[0];
        $curMax = $nums[0];
        $minSum = $nums[0];
        $curMin = $nums[0];

        for ($i = 1; $i < $n; $i++) {
            $num = $nums[$i];
            $total += $num;

            $curMax = max($num, $curMax + $num);
            $maxSum = max($maxSum, $curMax);

            $curMin = min($num, $curMin + $num);
            $minSum = min($minSum, $curMin);
        }

        if ($maxSum < 0) { return $maxSum; }

        return max($maxSum, $total - $minSum);        
    }
}

$c = new Solution;
print_r($c->maxSubarraySumCircular([1,-2,3,-2])); // Expect 3
print "\n";
print_r($c->maxSubarraySumCircular([5,-3,5])); // Expect 10
print "\n";
print_r($c->maxSubarraySumCircular([-3,-2,-3])); // Expect -2
?>