/*
There exists an infinitely large two-dimensional grid of uncolored unit cells. 
    You are given a positive integer n, indicating that you must do the following routine for n minutes:
At the first minute, color any arbitrary unit cell blue.
Every minute thereafter, color blue every uncolored cell that touches a blue cell.
    Return the number of colored cells at the end of n minutes.
*/
/* 2579. Count Total Number of Colored Cells */

struct Solution;
impl Solution {
    pub fn colored_cells(n: i32) -> i64 {
        if n == 1 { return 1; }
        let n = n as i64;
        (n.pow(2u32) + (n - 1).pow(2u32)) as i64
    }
}

fn main() {
    //let result = Solution::colored_cells(1); // Expect 1
    //let result = Solution::colored_cells(2); // Expect 5
    //let result = Solution::colored_cells(3); // Expect 13
    let result = Solution::colored_cells(69675); // Expect 9709071901
    println!("{:?}", result);
}