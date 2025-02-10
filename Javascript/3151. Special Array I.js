/**
 * 3151. Special Array I
 * @param {number[]} nums
 * @return {boolean}
 */
var isArraySpecial = function(nums) {
    const n = nums.length;
    if (n < 2) { return true; }
    for (let i = 0; i < n -1; i++) {
        if ((nums[i] + nums[i+1])%2 === 0) { return false; }
    }
    return true;
};
//console.log(isArraySpecial([1])); // Expect true
//console.log(isArraySpecial([2,1,4])); // Expect true
console.log(isArraySpecial([4,3,1,6])); // Expect false