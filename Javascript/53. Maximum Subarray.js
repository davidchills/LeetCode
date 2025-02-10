/**
 * 53. Maximum Subarray
 * @param {number[]} nums
 * @return {number}
 */
var maxSubArray = function(nums) {
    const n = nums.length;
    if (n === 0) { return 0; }
    let currentSub = nums[0];
    let maxSub = nums[0];
    
    for (let i = 1; i < n; i++) {
        let num = nums[i];
        currentSub = Math.max(num, (currentSub + num));
        maxSub = Math.max(maxSub, currentSub);
    }
    return maxSub;
};


console.log(maxSubArray([-2,1,-3,4,-1,2,1,-5,4])); // Expect 6
//console.log(maxSubArray([5,4,-1,7,8])); // Expect 23
//console.log(maxSubArray([1])); // Expect 1



