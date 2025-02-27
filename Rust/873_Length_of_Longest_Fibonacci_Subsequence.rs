/*
A sequence x1, x2, ..., xn is Fibonacci-like if:
    • n >= 3
    • xi + xi+1 == xi+2 for all i + 2 <= n
Given a strictly increasing array arr of positive integers forming a sequence, return the length of the longest 
    Fibonacci-like subsequence of arr. If one does not exist, return 0.
A subsequence is derived from another sequence arr by deleting any number of elements (including none) from arr, 
    without changing the order of the remaining elements. For example, [3, 5, 8] is a subsequence of [3, 4, 5, 6, 7, 8].
*/
/* 873. Length of Longest Fibonacci Subsequence */
use std::collections::HashSet;
use std::cmp::max;
struct Solution;
impl Solution {
    pub fn len_longest_fib_subseq(arr: Vec<i32>) -> i32 {
        let n = arr.len();
        if n < 4 { return 0; }
        let mut longest = 0;
        let keys: HashSet<_> = arr.clone().into_iter().collect();
        
        for i in 0..n {
            for j in i + 1..n {
                let mut seq = 2;
                let [mut a, mut b] = [arr[i], arr[j]];
                while keys.contains(&(a + b)) {
                    [a, b] = [b, a + b];
                    seq += 1;
                }
                if seq > 2 {
                    longest = max(longest, seq);
                }
            }
        }
        longest
    }
}

fn main() {
    //let arr = vec![1,2,3,4,5,6,7,8]; // Expect 5
    //let arr = vec![1,3,7,11,12,14,18]; // Expect 3
    //let arr = vec![1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]; // Expect 6
    let arr = vec![2,4,7,8,9,10,14,15,18,23,32,50]; // Expect 5
    let result = Solution::len_longest_fib_subseq(arr);
    println!("{:?}", result);
}