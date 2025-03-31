/*
Given a circular integer array nums of length n, return the maximum possible sum of a non-empty subarray of nums.
A circular array means the end of the array connects to the beginning of the array. 
    Formally, the next element of nums[i] is nums[(i + 1) % n] and the previous element of nums[i] is nums[(i - 1 + n) % n].
A subarray may only include each element of the fixed buffer nums at most once. 
    Formally, for a subarray nums[i], nums[i + 1], ..., nums[j], there does not exist i <= k1, k2 <= j with k1 % n == k2 % n.
*/
/**
 * 918. Maximum Sum Circular Subarray
 * @param {number[]} nums
 * @return {number}
 */
var maxSubarraySumCircular = function(nums) {
    const n = nums.length;
    let total = nums[0];
    let maxSum = nums[0];
    let curMax = nums[0];
    let minSum = nums[0];
    let curMin = nums[0];
    
    for (let i = 1; i < n; i++) {
        const num = nums[i];
        total += num;
        curMax = Math.max(num, curMax + num);
        maxSum = Math.max(maxSum, curMax);
        curMin = Math.min(num, curMin + num);
        minSum = Math.min(minSum, curMin);
    }
    if (maxSum < 0) { return maxSum; }
    return Math.max(maxSum, total - minSum);
};

console.log(maxSubarraySumCircular([1,-2,3,-2])); // Expect 3
console.log(maxSubarraySumCircular([5,-3,5])); // Expect 10
console.log(maxSubarraySumCircular([-3,-2,-3])); // Expect -2
