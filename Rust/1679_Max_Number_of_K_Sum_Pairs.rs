/*
You are given an integer array nums and an integer k.

In one operation, you can pick two numbers from the array whose sum equals k and remove them from the array.

Return the maximum number of operations you can perform on the array.
*/
/* 1679. Max Number of K-Sum Pairs */
struct Solution;
impl Solution {
    pub fn max_operations(mut nums: Vec<i32>, k: i32) -> i32 {
        nums.sort();
        let mut left = 0;
        let mut right = nums.len() - 1;
        let mut result = 0;
        
        while left < right {
            let sum = nums[left] + nums[right];
            if sum == k {
                result += 1;
                left += 1;
                right -= 1;
            }
            else if sum < k { left += 1; }
            else { right -= 1; }
        }
        
        result
    }
}

fn main() {
    //let nums = vec![1,2,3,4];
    //let k = 5;
    // Expect 2
    
    let nums = vec![3,1,3,4,3];
    let k = 6;
    // Expect 1
    
    let result = Solution::max_operations(nums, k);
    println!("{:?}", result);
    // Expect 2
}
