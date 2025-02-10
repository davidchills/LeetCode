/**
 * 15. 3Sum
 * @param {number[]} nums
 * @return {number[][]}
 */
var threeSum = function(nums) {
    rv = []
    nums.sort((a, b) => {
        if (a < b) { return -1 }
        else if (a > b) { return 1 }
        return 0
    })
    const n = nums.length
    for (let i = 0; i < n-2; i++) {
        if (i > 0 && nums[i] === nums[i-1]) { continue; }
        let target = -nums[i]
        let left = i+1
        let right = n-1
        while (left < right) {
            let sum = (nums[left] + nums[right])
            if (sum === target) {
                rv.push([nums[i], nums[left], nums[right]])
                while (left < right && nums[left] === nums[left+1]) { left++ }
                while (left < right && nums[right] === nums[right-1]) { right-- }
                left++
                right++
            }
            else if (sum < target) { left++ }
            else { right-- }
        }
    }
    return rv
};
//console.log(threeSum([-1,0,1,2,-1,-4])); // Expect [[-1,-1,2],[-1,0,1]]
//console.log(threeSum([0,1,1])); // Expect []
console.log(threeSum([0,0,0])); // Expect [0,0,0]
