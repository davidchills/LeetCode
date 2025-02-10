/**
 * 1800. Maximum Ascending Subarray Sum
 * @param {number[]} nums
 * @return {number}
 */
var maxAscendingSum = function(nums) {
    const n = nums.length;
    if (n === 0) { return 0; }
    let maxSum = nums[0];
    let currentSum = nums[0];
    
    for (let i = 1; i < n; i++) {
        if (nums[i-1] < nums[i]) {
            currentSum += nums[i];
        }
        else {
            maxSum = Math.max(maxSum, currentSum);
            currentSum = nums[i];
        }
    }
    return Math.max(maxSum, currentSum);
};

console.log(maxAscendingSum([10,20,30,5,10,50])); // Expect 65
//console.log(maxAscendingSum([10,20,30,40,50])); // Expect 150
//console.log(maxAscendingSum([12,17,15,13,10,11,12])); // Expect 33



