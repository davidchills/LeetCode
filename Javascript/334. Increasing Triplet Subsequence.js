/*
Given an integer array nums, return true if there exists a triple of indices (i, j, k) such that i < j < k and nums[i] < nums[j] < nums[k]. 
    If no such indices exists, return false.
The pattern does not need to be contiguous. Not included in instructions.
*/
/**
 * 334. Increasing Triplet Subsequence
 * @param {number[]} nums
 * @return {boolean}
 */
var increasingTriplet = function(nums) {
    const n = nums.length;
    if (n < 3) { return false; }
    let first = Number.MAX_VALUE;
    let second = Number.MAX_VALUE;
    
    for (let i = 0; i < n; i++) {
        if (nums[i] <= first) { first = nums[i]; }
        else if (nums[i] <= second) { second = nums[i]; }
        else { return true; }
    }
    return false;
};

console.log(increasingTriplet([1,2,3,4,5])); // Expect true
//console.log(increasingTriplet([5,4,3,2,1])); // Expect false
//console.log(increasingTriplet([2,1,5,0,4,6])); // Expect true
//console.log(increasingTriplet([20,100,10,12,5,13])); // Expect true
//console.log(increasingTriplet([1,2,0,3])); // Expect true