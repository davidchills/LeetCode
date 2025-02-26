/*
Given an integer array nums of length n, you want to create an array ans of length 2n where ans[i] == nums[i] and ans[i + n] == nums[i] for 0 <= i < n (0-indexed).

Specifically, ans is the concatenation of two nums arrays.

Return the array ans.
*/
/* 1929. Concatenation of Array */
struct Solution;
impl Solution {
    pub fn get_concatenation(nums: Vec<i32>) -> Vec<i32> {
        
        nums.iter().chain(nums.iter()).copied().collect()

    }
}

fn main() {
    let nums = vec![1,3,2,1];
    let result = Solution::get_concatenation(nums);
    println!("{:?}", result);
    // Expect [1,3,2,1,1,3,2,1]
}