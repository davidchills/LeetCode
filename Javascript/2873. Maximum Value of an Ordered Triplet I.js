/*
You are given a 0-indexed integer array nums.
Return the maximum value over all triplets of indices (i, j, k) such that i < j < k. If all such triplets have a negative value, return 0.
The value of a triplet of indices (i, j, k) is equal to (nums[i] - nums[j]) * nums[k].
*/
/**
 * 2873. Maximum Value of an Ordered Triplet I
 * @param {number[]} nums
 * @return {number}
 */
var maximumTripletValue = function(nums) {
    const n = nums.length;
    let maxVal = 0;
    for (let i = 0; i < n - 2; i++) {
        for (let j = i + 1; j < n - 1; j++) {
            for (let k = j + 1; k < n; k++) {
                const value = (nums[i] - nums[j]) * nums[k];
                maxVal = Math.max(maxVal, value);
            }
        }
    }
    return maxVal;
};

console.log(maximumTripletValue([12,6,1,2,7])); // Expect 77
console.log(maximumTripletValue([1,10,3,4,19]));  // Expect 133
console.log(maximumTripletValue([1,2,3]))  // Expect 0
