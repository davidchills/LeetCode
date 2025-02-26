/*
Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.
*/
/* 1. Two Sum */
use std::collections::HashMap;
struct Solution;
impl Solution {
    pub fn two_sum(nums: Vec<i32>, target: i32) -> Vec<i32> {
        let mut hash_map = HashMap::new();
        for (i, &v) in nums.iter().enumerate() {
            let complement = target - v;
            
            if let Some(&index) = hash_map.get(&complement) {
                return vec![index as i32, i as i32];
            }
            hash_map.insert(v, i);
        }
        unreachable!()
    }
}

fn main() {
    let nums = vec![2,7,11,15];
    let target = 9; // Expect [0,1]
    
    //let nums = vec![3,2,4];
    //let target = 6; // Expect [1,2]
    
    //let nums = vec![3,3];
    //let target = 6; // Expect [0,1]    
    
    let result = Solution::two_sum(nums, target);
    println!("{:?}", result);
}