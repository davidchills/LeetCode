/*
Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements.

Note that you must do this in-place without making a copy of the array.
*/
/**
 * 283. Move Zeroes
 * @param {number[]} nums
 * @return {void} Do not return anything, modify nums in-place instead.
 */
var moveZeroes = function(nums) {
    const n = nums.length;
    let index = 0;
    /*
    for (let i = 0; i < n; i++) {
        if (nums[i] !== 0) {
            nums[index++] = nums[i];
        }
    }
    
    while (index < n) {
        nums[index++] = 0;
    }
    */
    for (let i = 0; i < n; i++) {
        if (nums[i] !== 0) {
            if (i !== index) {
                [nums[index], nums[i]] = [nums[i], nums[index]];
            }
            index++;
        }
    }    
};
let nums = [0,1,0,3,12]; // Expect [1,3,12,0,0]
//let nums = [0]; // Expect [0]
//let nums = [0,0,0]; // Expect [0,0,0]
//let nums = [1,2,3,0,0,2,3,0]; // Expect [1,2,3,2,3,0,0,0]



moveZeroes(nums);
console.log(nums);
