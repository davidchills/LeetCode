/*
There is a biker going on a road trip. The road trip consists of n + 1 points at different altitudes. 
    The biker starts his trip on point 0 with altitude equal 0.
You are given an integer array gain of length n where gain[i] is the net gain in altitude between points i​​​​​​ and i + 1 for all (0 <= i < n). 
    Return the highest altitude of a point.
*/
/* 1732. Find the Highest Altitude */
use std::cmp::max;
struct Solution;
impl Solution {
    pub fn largest_altitude(gain: Vec<i32>) -> i32 {
        let mut max_alt = 0;
        let mut last = 0;
        
        for &alt in &gain {
            last += alt;
            max_alt = max(max_alt, last);
        }
        max_alt
    }
}

fn main() {
    //let gain = vec![-5,1,5,0,-7]; // Expect 1
    let gain = vec![-4,-3,-2,-1,4,3,2]; // Expect 1
    let result = Solution::largest_altitude(gain);
    println!("{:?}", result);
}