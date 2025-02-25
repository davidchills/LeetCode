/*
Given an array of integers arr, return the number of subarrays with an odd sum.

Since the answer can be very large, return it modulo 10^9 + 7.
*/
/* 1524. Number of Sub-arrays With Odd Sum */
struct Solution;
impl Solution {
    pub fn num_of_subarrays(arr: Vec<i32>) -> i32 {
        let modulo = 10_i32.pow(9) + 7;
        let mut odd_count: i32 = 0;
        let mut even_count: i32 = 1;
        let mut prefix_sum: i32 = 0;
        let mut result: i32 = 0;
        
        for num in arr {
            prefix_sum += num;
            if prefix_sum % 2 == 1 {
                result = (result + even_count) % modulo;
                odd_count += 1;
            }
            else {
                result = (result + odd_count) % modulo;
                even_count += 1;
            }
        }
        
        result
    }
}

fn main() {
    //let arr = vec![1,3,5]; // Expect 4
    //let arr = vec![2,4,6]; // Expect 0
    let arr = vec![1,2,3,4,5,6,7]; // Expect 16
    let result = Solution::num_of_subarrays(arr);
    println!("{:?}", result);
}