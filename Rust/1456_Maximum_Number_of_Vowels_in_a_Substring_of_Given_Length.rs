/*
Given a string s and an integer k, return the maximum number of vowel letters in any substring of s with length k.
Vowel letters in English are 'a', 'e', 'i', 'o', and 'u'.
*/
/* 1456. Maximum Number of Vowels in a Substring of Given Length */
use std::collections::HashSet;
use std::cmp::max;
struct Solution;
impl Solution {
    pub fn max_vowels(s: String, k: i32) -> i32 {
        let n = s.len();
        let s_chars: Vec<char> = s.chars().collect();
        let letters = vec!['a', 'e', 'i', 'o', 'u'];
        let vowels: HashSet<_> = letters.iter().cloned().collect();
        let mut max_vc = 0;
        let mut curr_vc = 0;
        
        for i in 0..k as usize {
            if vowels.contains(&s_chars[i]) {
                curr_vc += 1;
            }
        }
        max_vc = curr_vc;
        
        for i in k as usize..n {
            if vowels.contains(&s_chars[i - k as usize]) {
                curr_vc -= 1;
            }
            if vowels.contains(&s_chars[i]) {
                curr_vc += 1;
            }
            max_vc = max(max_vc, curr_vc);
        }
        max_vc
    }
}

fn main() {
    //let s = String::from("abciiidef");
    //let k = 3; // Expect 3
    
    //let s = String::from("aeiou");
    //let k = 2; // Expect 2
    
    let s = String::from("leetcode");
    let k = 3; // Expect 2    
    
    let result = Solution::max_vowels(s, k);
    println!("{:?}", result);
}