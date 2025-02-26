/*
Given two strings s and t, return true if s is a subsequence of t, or false otherwise.

A subsequence of a string is a new string that is formed from the original string by deleting some (can be none) 
    of the characters without disturbing the relative positions of the remaining characters. 
    (i.e., "ace" is a subsequence of "abcde" while "aec" is not).
*/
/* 392. Is Subsequence */
struct Solution;
impl Solution {
    pub fn is_subsequence(s: String, t: String) -> bool {
        if (s.is_empty()) { return true; }
        
        let mut s_chars = s.chars();
        let mut s_iter = s_chars.next();
        
        for t_char in t.chars() {
            if Some(t_char) == s_iter {
                s_iter = s_chars.next();
            }
        }
        s_iter.is_none()
    }
}

fn main() {
    //let s = String::from("abc");
    //let t = String::from("ahbgdc");
    // Expect true
    
    let s = String::from("aaaaaa");
    let t = String::from("bbaaaa");
    // Expect false
    
    let result = Solution::is_subsequence(s, t);
    println!("{}", result);
}