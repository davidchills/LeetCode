/*
Given a binary array nums and an integer k, return the maximum number of consecutive 1's in the array if you can flip at most k 0's.
*/
/* 1004. Max Consecutive Ones III */
use std::cmp::max;
struct Solution;
impl Solution {
    pub fn longest_ones(nums: Vec<i32>, k: i32) -> i32 {
        let n = nums.len();
        let mut left: usize = 0;
        let mut zero_count = 0;
        let mut max_len: i32 = 0;
        
        for right in 0..n {
            if nums[right] == 0 {
                zero_count += 1;
            }
            while zero_count > k {
                if nums[left] == 0 {
                    zero_count -= 1;
                }
                left += 1;
            }
            max_len = max(max_len, (right - left + 1) as i32);
        }
        
        max_len
    }
}

fn main() {
    //let nums = vec![1,1,1,0,0,0,1,1,1,1,0];
    //let k = 2; // Expect 6
    
    let nums = vec![0,0,1,1,0,0,1,1,1,0,1,1,0,0,0,1,1,1,1];
    let k = 3; // Expect 10
    
    let solution = Solution::longest_ones(nums, k);
    println!("{:?}", solution);
}