/*
A peak element is an element that is strictly greater than its neighbors.
Given a 0-indexed integer array nums, find a peak element, and return its index. 
    If the array contains multiple peaks, return the index to any of the peaks.
You may imagine that nums[-1] = nums[n] = -∞. In other words, 
    an element is always considered to be strictly greater than a neighbor that is outside the array.
You must write an algorithm that runs in O(log n) time.
*/
/**
 * 162. Find Peak Element
 * @param {number[]} nums
 * @return {number}
 */
var findPeakElement = function(nums) {
    let left = 0;
    let right = nums.length - 1;
    while (left < right) {
        const mid = left + Math.floor((right - left) / 2);
        if (nums[mid] > nums[mid + 1]) { right = mid; }
        else { left = mid + 1; }
    }
    return left;
};

console.log(findPeakElement([1,2,3,1])); // Expect 2
console.log(findPeakElement([1,2,1,3,5,6,4]));  // Expect 5
