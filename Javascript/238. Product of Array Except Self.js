/**
 * 238. Product of Array Except Self
 * @param {number[]} nums
 * @return {number[]}
 */
var productExceptSelf = function(nums) {
    const kount = nums.length
    const out = []
    console.log(out.length)
    let prefix = 1
    // Forward Pass.
    for (let i = 0; i < kount; i++) {
        out[i] = prefix
        prefix *= nums[i]
    }
    // Reverse Pass.
    let suffix = 1 
    for (let i = kount -1; i >= 0; i--) {
        out[i] *= suffix
        suffix *= nums[i]
    }
    return out
};

console.log(productExceptSelf([-1,1,0,-3,3]));