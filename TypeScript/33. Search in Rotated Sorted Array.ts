/*
There is an integer array nums sorted in ascending order (with distinct values).
Prior to being passed to your function, nums is possibly rotated at an unknown pivot index k (1 <= k < nums.length) 
    such that the resulting array is [nums[k], nums[k+1], ..., nums[n-1], nums[0], nums[1], ..., nums[k-1]] (0-indexed). 
    For example, [0,1,2,4,5,6,7] might be rotated at pivot index 3 and become [4,5,6,7,0,1,2].
Given the array nums after the possible rotation and an integer target, return the index of target if it is in nums, or -1 if it is not in nums.
You must write an algorithm with O(log n) runtime complexity.

33. Search in Rotated Sorted Array
*/

function search(nums: number[], target: number): number {
    const n = nums.length;
    if (n === 0) { return -1; }
    let left = 0;
    let right = n - 1;
    
    while (left <= right) {
        const mid = left + Math.floor((right - left) / 2);
        if (nums[mid] === target) {
            return mid;
        }
        if (nums[left] <= nums[mid]) {
            if (nums[left] <= target && target < nums[mid]) {
                right = mid - 1;
            }
            else { left = mid + 1; }
        }
        else {
            if (nums[mid] < target && target <= nums[right]) {
                left = mid + 1;
            }
            else { right = mid - 1; }
        }
    }
    return -1;    
};

console.log(search([4,5,6,7,0,1,2], 0)); // Expect 4
console.log(search([4,5,6,7,0,1,2], 3));  // Expect -1
console.log(search([1], 0));  // Expect -1