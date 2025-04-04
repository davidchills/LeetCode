/*
Given an array of integers nums sorted in non-decreasing order, find the starting and ending position of a given target value.
If target is not found in the array, return [-1, -1].
You must write an algorithm with O(log n) runtime complexity.

34. Find First and Last Position of Element in Sorted Array
*/

function searchRange(nums: number[], target: number): number[] {
    const n = nums.length;
    function findLeft(): number {
        let left = 0;
        let right = n - 1;
        let index = -1;
        while (left <= right) {
            const mid = left + Math.floor((right - left) / 2);
            if (nums[mid] >= target) {
                if (nums[mid] === target) { index = mid; }
                right = mid - 1;
            }
            else { left = mid + 1; }
        }
        return index;
    }
    function findRight(): number {
        let left = 0;
        let right = n - 1;
        let index = -1;
        while (left <= right) {
            const mid = left + Math.floor((right - left) / 2);
            if (nums[mid] <= target) {
                if (nums[mid] === target) { index = mid; }
                left = mid + 1;
            }
            else { right = mid - 1; }
        }
        return index;
    }
    const leftIndex = findLeft();
    if (leftIndex === -1) { return [-1, -1]; }
    const rightIndex = findRight();
    return [leftIndex, rightIndex];    
};

console.log(searchRange([5,7,7,8,8,10], 8)); // Expect [3,4]
console.log(searchRange([5,7,7,8,8,10], 6)); // Expect [-1,-1]
console.log(searchRange([], 0)); // Expect [-1,-1]
