/*
Given a binary array nums, you should delete one element from it.
Return the size of the longest non-empty subarray containing only 1's in the resulting array. Return 0 if there is no such subarray.
*/
/**
 * 1493. Longest Subarray of 1's After Deleting One Element
 * @param {number[]} nums
 * @return {number}
 */
var longestSubarray = function(nums) {
    const n = nums.length;
    let left = 0;
    let zeroCount = 0;
    let maxLength = 0;
    
    for (let right = 0; right < n; right++) {
        if (nums[right] === 0) {
            zeroCount++;
        }
        while (zeroCount > 1) {
            if (nums[left] === 0) {
                zeroCount--;
            }
            left++;
        }
        maxLength = Math.max(maxLength, right - left);
    }
    return maxLength;    
};

//console.log(longestSubarray([1,1,0,1])); // Expect 3
//console.log(longestSubarray([0,1,1,1,0,1,1,0,1])); // Expect 5
console.log(longestSubarray([1,1,1])); // Expect 2
