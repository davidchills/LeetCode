/*
Given an integer array nums, return true if there exists a triple of indices (i, j, k) such that i < j < k and nums[i] < nums[j] < nums[k]. 
    If no such indices exists, return false.
The pattern does not need to be contiguous. Not included in instructions.
*/
/* 334. Increasing Triplet Subsequence */
struct Solution;
impl Solution {
    pub fn increasing_triplet(nums: Vec<i32>) -> bool {
        let (mut first, mut second) = (i32::MAX, i32::MAX);
        
        for &num in &nums {
            if num <= first { first = num; } 
            else if num <= second { second = num; } 
            else { return true; }
        }
        
        false        
    }
}
/*
fn main() {
    let nums = vec![1,2,3,4,5];
    let result = Solution::increasing_triplet(nums);
    println!("{}", result);
    // Expect true
}
*/
/*
fn main() {
    let nums = vec![5,4,3,2,1];
    let result = Solution::increasing_triplet(nums);
    println!("{}", result);
    // Expect false
}
*/

fn main() {
    let nums = vec![2,1,5,0,4,6];
    let result = Solution::increasing_triplet(nums);
    println!("{}", result);
    // Expect true
}

/*
fn main() {
    let nums = vec![20,100,10,12,5,13];
    let result = Solution::increasing_triplet(nums);
    println!("{}", result);
    // Expect true
}
*/
/*
fn main() {
    let nums = vec![1,2,0,3];
    let result = Solution::increasing_triplet(nums);
    println!("{}", result);
    // Expect true
}
*/