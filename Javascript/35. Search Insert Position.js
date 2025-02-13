/*
Given a sorted array of distinct integers and a target value, return the index if the target is found. If not, return the index where it would be if it were inserted in order.

You must write an algorithm with O(log n) runtime complexity.
*/
/**
 * 35. Search Insert Position
 * @param {number[]} nums
 * @param {number} target
 * @return {number}
 */
var searchInsert = function(nums, target) {
    const n = nums.length;
    if (target < nums[0]) { return 0; }
    if (target > nums[n-1]) { return n; }
    let start = 0;
    let end = n-1;
    while (start <= end) {
        let mid = Math.floor((start + end) / 2);
        if (target > nums[mid]) { start = (mid + 1); }
        else if (target < nums[mid]) { end = (mid - 1); }
        else return mid;
    }
    return start;
};

//console.log(searchInsert([1,3,5,6], 5)); // Expect 2
//console.log(searchInsert([1,3,5,6], 2)); // Expect 1
console.log(searchInsert([1,3,5,6], 7)); // Expect 4



