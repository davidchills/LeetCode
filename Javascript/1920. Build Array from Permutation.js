/*
Given a zero-based permutation nums (0-indexed), build an array ans of the same length where 
    ans[i] = nums[nums[i]] for each 0 <= i < nums.length and return it.
A zero-based permutation nums is an array of distinct integers from 0 to nums.length - 1 (inclusive).
*/
/**
 * 1920. Build Array from Permutation
 * @param {number[]} nums
 * @return {number[]}
 */
var buildArray = function(nums) {
    const n = nums.length;
    
    // Encode new values in place
    for (let i = 0; i < n; i++) {
        nums[i] += n * (nums[nums[i]] % n);
    }
    
    // Decode values in place
    for (let i = 0; i < n; i++) {
        nums[i] = parseInt(nums[i] / n);
    }
    
    return nums;    
};

//console.log(buildArray([0,2,1,5,3,4])); // Expect [0,1,2,4,5,3]
console.log(buildArray([5,0,1,2,3,4])); // Expect [4,5,0,1,2,3]
