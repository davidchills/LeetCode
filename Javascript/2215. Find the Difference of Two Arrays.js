/*
Given two 0-indexed integer arrays nums1 and nums2, return a list answer of size 2 where:
answer[0] is a list of all distinct integers in nums1 which are not present in nums2.
answer[1] is a list of all distinct integers in nums2 which are not present in nums1.
Note that the integers in the lists may be returned in any order.
*/
/**
 * 2215. Find the Difference of Two Arrays
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @return {number[][]}
 */
var findDifference = function(nums1, nums2) {
    const keys1 = new Set(nums1);
    const keys2 = new Set(nums2);
    nums1 = [...keys1];
    nums2 = [...keys2]
    
    for (let num of nums1) {
        if (keys2.has(num)) {
            keys2.delete(num);
        }
    }
    for (let num of nums2) {
        if (keys1.has(num)) {
            keys1.delete(num);
        }
    }    
    return [[...keys1], [...keys2]];
};

console.log(findDifference([1,2,3], [2,4,6])); // Expect [[1,3],[4,6]]
//console.log(findDifference([1,2,3,3], [1,1,2,2])); // Expect [[3],[]]
