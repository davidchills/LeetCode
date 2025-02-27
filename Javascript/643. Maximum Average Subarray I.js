/*
You are given an integer array nums consisting of n elements, and an integer k.
Find a contiguous subarray whose length is equal to k that has the maximum average value and return this value. 
    Any answer with a calculation error less than 10-5 will be accepted.
*/
/**
 * 643. Maximum Average Subarray I
 * @param {number[]} nums
 * @param {number} k
 * @return {number}
 */
var findMaxAverage = function(nums, k) {
    const n = nums.length;
    let windowSum = nums.slice(0, k).reduce((acc, curr) => acc + curr);
    let maxSum = windowSum;
    
    for (let i = k; i < n; i++) {
        windowSum += nums[i] - nums[i - k];
        maxSum = Math.max(maxSum, windowSum);
    }
    return maxSum / k;
};

console.log(findMaxAverage([1,12,-5,-6,50,3], 4)); // Expect 12.75
//console.log(findMaxAverage([5], 1)); // Expect 5.0
//console.log(findMaxAverage([7,4,5,8,8,3,9,8,7,6], 7)); // Expect 7.0
