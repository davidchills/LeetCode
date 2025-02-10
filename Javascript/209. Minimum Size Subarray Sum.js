/**
 * 209. Minimum Size Subarray Sum
 * @param {number} target
 * @param {number[]} nums
 * @return {number}
 */
var minSubArrayLen = function(target, nums) {
    let currentSum = 0
    const n = nums.length
    let minLength = Number.MAX_SAFE_INTEGER
    let left = 0
    
    for (let right = 0; right < n; right++) {
        currentSum += nums[right]
        while (currentSum >= target) {
            minLength = Math.min(minLength, ((right - left) + 1))
            currentSum -= nums[left]
            left++
        }
    }
    return minLength === Number.MAX_SAFE_INTEGER ? 0 : minLength
};
//console.log(minSubArrayLen(7, [2,3,1,2,4,3])); // Expect 2
//console.log(minSubArrayLen(4, [1,4,4])); // Expect 1
//console.log(minSubArrayLen(11, [1,1,1,1,1,1,1,1])); // Expect 0
console.log(minSubArrayLen(11, [1,2,3,4,5])); // Expect 3
