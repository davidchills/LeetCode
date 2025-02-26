/*
Given an integer array nums of length n, you want to create an array ans of length 2n where ans[i] == nums[i] and ans[i + n] == nums[i] for 0 <= i < n (0-indexed).

Specifically, ans is the concatenation of two nums arrays.

Return the array ans.
*/
/**
 * 1929. Concatenation of Array
 * @param {number[]} nums
 * @return {number[]}
 */
var getConcatenation = function(nums) {
    return [...nums, ...nums];
};

console.log(getConcatenation([1,2,1])); // Expect [1,2,1,1,2,1]
//console.log(getConcatenation([1,3,2,1])); // Expect [1,3,2,1,1,3,2,1]
