/*
You are given an integer array nums. Transform nums by performing the following operations in the exact order specified:
Replace each even number with 0.
Replace each odd numbers with 1.
Sort the modified array in non-decreasing order.
Return the resulting array after performing these operations.
*/
/**
 * 3467. Transform Array by Parity
 * @param {number[]} nums
 * @return {number[]}
 */
var transformArray = function(nums) {
    const n = nums.length;
    for (let i = 0; i < n; i += 1) {
        nums[i] = (nums[i] % 2 === 0) ? 0 : 1;
    }
    return nums.sort((a, b) => a - b);
};

console.log(transformArray([4,3,2,1])); // Expect [0,0,1,1]
console.log(transformArray([1,5,1,4,2])); // Expect [0,0,1,1,1]
