/**
 * 3105. Longest Strictly Increasing or Strictly Decreasing Subarray
 * @param {number[]} nums
 * @return {number}
 */
var longestMonotonicSubarray = function(nums) {
    const n = nums.length;
    if (n < 2) { return n; }
    let max = 1;
    let currDec = 1;
    let currInc = 1;
    
    for (let i = 1; i < n; i++) {
        if (nums[i-1] < nums[i]) {
            currInc++;
            currDec = 1;
        }
        else if (nums[i-1] > nums[i]) {
            currDec++;
            currInc = 1;
        }  
        else {
            currDec = 1;
            currInc = 1;
        }
        max = Math.max(max, currDec, currInc);
    }
    return max;
};

console.log(longestMonotonicSubarray([1,4,3,3,2])); // Expect 2
//console.log(longestMonotonicSubarray([3,3,3,3])); // Expect 1
//console.log(longestMonotonicSubarray([3,2,1])); // Expect 3




