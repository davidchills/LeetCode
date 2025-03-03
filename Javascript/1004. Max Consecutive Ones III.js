/*
Given a binary array nums and an integer k, return the maximum number of consecutive 1's in the array if you can flip at most k 0's.
*/
/**
 * 1004. Max Consecutive Ones III
 * @param {number[]} nums
 * @param {number} k
 * @return {number}
 */
var longestOnes = function(nums, k) {
    const n = nums.length;
    let left = 0;
    let zeroCount = 0;
    let maxLength = 0;
    
    for (let right = 0; right < n; right++) {
        if (nums[right] === 0) {
            zeroCount++;
        }
        while (zeroCount > k) {
            if (nums[left] === 0) {
                zeroCount--;
            }
            left++;
        }
        maxLength = Math.max(maxLength, right - left + 1);
    }
    return maxLength;
};

//console.log(longestOnes([1,1,1,0,0,0,1,1,1,1,0], 2)); // Expect 6
console.log(longestOnes([0,0,1,1,0,0,1,1,1,0,1,1,0,0,0,1,1,1,1], 3)); // Expect 10
