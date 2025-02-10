/**
 * 4. Median of Two Sorted Arrays
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @return {number}
 */
var findMedianSortedArrays = function(nums1, nums2) {
    const nums = [...nums1, ...nums2].sort((a,b) => {
        if (a < b) { return -1 }
        else if (a > b) { return 1 }
        else { return 0 }
    })
    const middle = Math.floor(nums.length / 2)
    if (nums.length % 2 === 0) {
        return ((nums[middle] + nums[middle-1]) / 2)
    }
    else {return nums[middle] }
    return nums
};
//console.log(findMedianSortedArrays([1,3], [2])); // Expect 2
console.log(findMedianSortedArrays([1,2], [3,4])); // Expect 2.5

