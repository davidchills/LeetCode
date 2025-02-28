/*
Given two strings str1 and str2, return the shortest string that has both str1 and str2 as subsequences. 
    If there are multiple valid strings, return any of them.
A string s is a subsequence of string t if deleting some number of characters from t (possibly 0) results in the string s.
*/
/* 1092. Shortest Common Supersequence  */
use std::cmp;
struct Solution;
impl Solution {
    pub fn shortest_common_supersequence(str1: String, str2: String) -> String {
        
        let m = str1.len();
        let n = str2.len();
        let str1_chars: Vec<char> = str1.chars().collect();
        let str2_chars: Vec<char> = str2.chars().collect();
    
        // Step 1: Compute LCS DP table
        let mut dp = vec![vec![0; n + 1]; m + 1];
    
        for i in 1..=m {
            for j in 1..=n {
                if str1_chars[i - 1] == str2_chars[j - 1] {
                    dp[i][j] = dp[i - 1][j - 1] + 1;
                } 
                else {
                    dp[i][j] = cmp::max(dp[i - 1][j], dp[i][j - 1]);
                }
            }
        }
    
        // Step 2: Backtrack to construct SCS
        let mut i = m;
        let mut j = n;
        let mut scs = Vec::with_capacity(m + n);
    
        while i > 0 || j > 0 {
            if i > 0 && j > 0 && str1_chars[i - 1] == str2_chars[j - 1] {
                scs.push(str1_chars[i - 1]);
                i -= 1;
                j -= 1;
            } 
            else if i > 0 && (j == 0 || dp[i - 1][j] >= dp[i][j - 1]) {
                scs.push(str1_chars[i - 1]);
                i -= 1;
            } 
            else {
                scs.push(str2_chars[j - 1]);
                j -= 1;
            }
        }
    
        scs.reverse();
        scs.into_iter().collect()
    }
}

fn main() {
    //let str1 = "abac";
    //let str2 = "cab"; // Expect "cabac"
    //let str1 = "aaaaaaaa";
    //let str2 = "aaaaaaaa"; // Expect "aaaaaaaa"
    let str1 = "babbbbaa";
    let str2 = "baabbbbba"; // Expect "baabbbbbaa"
    let result = Solution::shortest_common_supersequence(str1.to_string(), str2.to_string());
    println!("{:?}", result);
}