/*
Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.
*/
/**
 * 1. Two Sum
 * @param {number[]} nums
 * @param {number} target
 * @return {number[]}
 */
var twoSum = function(nums, target) {
    /*
    for (let i = 0; i < nums.length; i++) {
        for (let j = i + 1; j < nums.length; j++) {
            if ((nums[i] + nums[j]) === target) { return [i,j]; }
        }
    }
    */
    let mp = new Map()    
    for (let i = 0; i < nums.length; i++) {
        let diff = target - nums[i]        
        if (mp.has(diff)) {
            return [mp.get(diff), i]
        }
        mp.set(nums[i], i)
    }    
};
//console.log(twoSum([2,7,11,15], 9)); // Expect [0,1]
//console.log(twoSum([3,2,4], 6)); // Expect [1,2]
//console.log(twoSum([3,3], 6)); // Expect [0,1]