/*
The Tribonacci sequence Tn is defined as follows: 
T0 = 0, T1 = 1, T2 = 1, and Tn+3 = Tn + Tn+1 + Tn+2 for n >= 0.
Given n, return the value of Tn.
*/
/* 1137. N-th Tribonacci Number */
struct Solution;
impl Solution {
    pub fn tribonacci(n: i32) -> i32 {
        if n == 0 { return 0; }
        if n < 3 { return 1; }
        
        let mut x = 0;
        let mut y = 1;
        let mut z = 1;
        
        for i in 3..=n {
            (x, y, z) = (y, z, x + y + z);
        }
        z
    }
}

fn main() {
    //let result = Solution::tribonacci(4); // Expect 4
    let result = Solution::tribonacci(25); // Expect 1389537
    println!("{:?}", result);
}