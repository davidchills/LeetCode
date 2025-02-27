/*
You are given an integer array nums consisting of n elements, and an integer k.
Find a contiguous subarray whose length is equal to k that has the maximum average value and return this value. 
    Any answer with a calculation error less than 10-5 will be accepted.
*/
/* 643. Maximum Average Subarray I */
use std::cmp;
struct Solution;
impl Solution {
    pub fn find_max_average(nums: Vec<i32>, k: i32) -> f64 {
        let n = nums.len();
        let k_usize = k as usize;
        let mut window_sum: i32 = nums[0..k_usize].iter().sum();
        let mut max_sum: i32 = window_sum; 
        
        for i in k_usize..n {
            window_sum += nums[i] - nums[i - k_usize];
            max_sum = cmp::max(max_sum, window_sum);
        }
        f64::from(max_sum) / f64::from(k)
    }
}

fn main() {
    //let nums = vec![1,12,-5,-6,50,3];
    //let k = 4; // Expect 12.75
    
    //let nums = vec![5];
    //let k = 1; // Expect 5
    
    let nums = vec![7,4,5,8,8,3,9,8,7,6];
    let k = 7; // Expect 7    
    
    let result = Solution::find_max_average(nums, k);
    println!("{:?}", result);
}