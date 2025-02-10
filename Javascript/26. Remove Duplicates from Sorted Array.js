/**
 * @param {number[]} nums
 * @return {number}
 */
var removeDuplicates = function(nums) {
    const length = nums.length;
    if (length == 0) { return 0; }
    let i = 0;
    for (let x = 1; x < length; x++) {
        if (nums[x] !== nums[i]) {
            i++;
            nums[i] = nums[x];
        }
    }
    return i + 1;     
};
//let nums = [1,1,2];
let nums = [0,0,1,1,1,2,2,3,3,4];
console.log(removeDuplicates(nums));
console.log(nums);