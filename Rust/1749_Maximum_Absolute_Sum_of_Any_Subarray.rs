/*
You are given an integer array nums. 
    The absolute sum of a subarray [numsl, numsl+1, ..., numsr-1, numsr] is abs(numsl + numsl+1 + ... + numsr-1 + numsr).
Return the maximum absolute sum of any (possibly empty) subarray of nums.
Note that abs(x) is defined as follows:
If x is a negative integer, then abs(x) = -x.
If x is a non-negative integer, then abs(x) = x.
*/
/* 1749. Maximum Absolute Sum of Any Subarray */
use std::cmp;
struct Solution;
impl Solution {
    pub fn max_absolute_sum(nums: Vec<i32>) -> i32 {
        let (mut max_sum, mut min_sum) = (0, 0);
        let (mut curr_max, mut curr_min) = (0, 0);
        
        for num in nums {
            curr_max = cmp::max(num, curr_max + num);
            max_sum = cmp::max(max_sum, curr_max);
            
            curr_min = cmp::min(num, curr_min + num);
            min_sum = cmp::min(min_sum, curr_min);
        }
        cmp::max(max_sum, min_sum.abs())
    }
}

fn main() {
    //let nums = vec![1,-3,2,3,-4]; // Expect 5
    //let nums = vec![2,-5,1,-4,3,-2]; // Expect 8
    //let nums = vec![-3,-2,-5,-1]; // Expect 11
    let nums = vec![3,2,1,0,-1,-2,-3]; // Expect 6
    let result = Solution::max_absolute_sum(nums);
    println!("{:?}", result);
}