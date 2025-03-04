/*
Given a binary array nums, you should delete one element from it.
Return the size of the longest non-empty subarray containing only 1's in the resulting array. Return 0 if there is no such subarray.
*/
/* 1493. Longest Subarray of 1's After Deleting One Element */
use std::cmp::max;
struct Solution;
impl Solution {
    pub fn longest_subarray(nums: Vec<i32>) -> i32 {
        let n = nums.len();
        let mut left: usize = 0;
        let mut zero_count = 0;
        let mut max_len: i32 = 0;
        
        for right in 0..n {
            if nums[right] == 0 {
                zero_count += 1;
            }
            while zero_count > 1 {
                if nums[left] == 0 {
                    zero_count -= 1;
                }
                left += 1;
            }
            max_len = max(max_len, (right - left) as i32);
        }
        
        max_len
    }
}

fn main() {
    //let nums = vec![1,1,0,1]; // Expect 3
    //let nums = vec![0,1,1,1,0,1,1,0,1]; // Expect 5
    let nums = vec![1,1,1]; // Expect 2
    let solution = Solution::longest_subarray(nums);
    println!("{:?}", solution);
}