/**
 * 674. Longest Continuous Increasing Subsequence
 * @param {number[]} nums
 * @return {number}
 */
var findLengthOfLCIS = function(nums) {
    const n = nums.length;
    let longest = 1;
    let current = 1;
    for (let i = 1; i < n; i++) {
        if (nums[i] > nums[i-1]) {
            current++;
            longest = Math.max(longest, current);
        }
        else { current = 1; }
    }
    return longest;
};
console.log(findLengthOfLCIS([1,3,5,4,7])); // Expect 3
//console.log(findLengthOfLCIS([2,2,2,2,2])); // Expect 1