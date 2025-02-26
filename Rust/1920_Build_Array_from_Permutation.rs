/*
Given a zero-based permutation nums (0-indexed), build an array ans of the same length where 
    ans[i] = nums[nums[i]] for each 0 <= i < nums.length and return it.
A zero-based permutation nums is an array of distinct integers from 0 to nums.length - 1 (inclusive).
*/
/* 1920. Build Array from Permutation */
struct Solution;
impl Solution {
    pub fn build_array(nums: Vec<i32>) -> Vec<i32> {
        let mut nums = nums;
        let n = nums.len();
        
        for i in 0..n {
            nums[i] += (n as i32) * (nums[nums[i] as usize] % (n as i32));
        }
        
        for i in 0..n {
            nums[i] = nums[i] / n as i32;
        }        
        
        nums
    }
}

fn main() {
    //let nums = vec![0,2,1,5,3,4]; // Expect [0,1,2,4,5,3]
    let nums = vec![5,0,1,2,3,4]; // Expect [4,5,0,1,2,3]
    let result = Solution::build_array(nums);
    println!("{:?}", result);
}