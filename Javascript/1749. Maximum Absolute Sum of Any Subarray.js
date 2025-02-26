/*
You are given an integer array nums. 
    The absolute sum of a subarray [numsl, numsl+1, ..., numsr-1, numsr] is abs(numsl + numsl+1 + ... + numsr-1 + numsr).
Return the maximum absolute sum of any (possibly empty) subarray of nums.
Note that abs(x) is defined as follows:
If x is a negative integer, then abs(x) = -x.
If x is a non-negative integer, then abs(x) = x.
*/
/**
 * 1749. Maximum Absolute Sum of Any Subarray
 * @param {number[]} nums
 * @return {number}
 */
// Using Kadane’s Algorithm, Faster on large array sets.
var maxAbsoluteSum = function(nums) {
    let maxSum = 0;
    let minSum = 0;
    let currMax = 0;
    let currMin = 0;
    
    for (let num of nums) {
        currMax = Math.max(num, currMax + num);
        maxSum = Math.max(maxSum, currMax);
        
        currMin = Math.min(num, currMin + num);
        minSum = Math.min(minSum, currMin);
    }
    return Math.max(maxSum, Math.abs(minSum));
};

//console.log(maxAbsoluteSum([1,-3,2,3,-4])); // Expect 5
//console.log(maxAbsoluteSum([2,-5,1,-4,3,-2])); // Expect 8
//console.log(maxAbsoluteSum([-3,-2,-5,-1])); // Expect 11
console.log(maxAbsoluteSum([3,2,1,0,-1,-2,-3])); // Expect 6
