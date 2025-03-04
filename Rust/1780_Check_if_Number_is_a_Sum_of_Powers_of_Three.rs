/*
Given an integer n, return true if it is possible to represent n as the sum of distinct powers of three. Otherwise, return false.
An integer y is a power of three if there exists an integer x such that y == 3x.
*/
/* 1780. Check if Number is a Sum of Powers of Three */
struct Solution;
impl Solution {
    pub fn check_powers_of_three(mut n: i32) -> bool {
        while n != 0 {
            if n % 3 == 2 { return false; }
            n /= 3;
        }
        true
    }
}

fn main() {
    //let result = Solution::check_powers_of_three(12); // Expect true
    //let result = Solution::check_powers_of_three(91); // Expect true
    let result = Solution::check_powers_of_three(21); // Expect false
    println!("{:?}", result);
}