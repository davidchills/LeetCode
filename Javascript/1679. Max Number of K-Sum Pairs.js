/*
You are given an integer array nums and an integer k.

In one operation, you can pick two numbers from the array whose sum equals k and remove them from the array.

Return the maximum number of operations you can perform on the array.
*/
/**
 * 1679. Max Number of K-Sum Pairs
 * @param {number[]} nums
 * @param {number} k
 * @return {number}
 */
var maxOperations = function(nums, k) {
    nums.sort((a, b) => a - b);
    let left = 0;
    let right = nums.length - 1;
    let result = 0;
    
    while (left < right) {
        const sum = nums[left] + nums[right];
        if (sum === k) {
            result++;
            left++;
            right--;
        }
        else if (sum < k) { left++; }
        else { right--; }
    }
    return result;
};

//console.log(maxOperations([1,2,3,4], 5)); // Expect 2
console.log(maxOperations([3,1,3,4,3], 6)); // Expect 1
