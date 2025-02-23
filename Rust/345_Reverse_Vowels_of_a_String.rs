/*
Given a string s, reverse only all the vowels in the string and return it.

The vowels are 'a', 'e', 'i', 'o', and 'u', and they can appear in both lower and upper cases, more than once.
*/
/* 345. Reverse Vowels of a String */
struct Solution;
impl Solution {
    pub fn reverse_vowels(s: String) -> String {
        let mut chars: Vec<char> = s.chars().collect();
        let vowels: Vec<char> = vec!['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        let (mut left, mut right) = (0, chars.len() - 1);
        
        while left < right {
            while left < right && !vowels.contains(&chars[left]) {
                left += 1;
            }
            while left < right && !vowels.contains(&chars[right]) {
                right -= 1;
            }
            if left < right {
                chars.swap(left, right);
                left += 1;
                right -= 1;
            }
        }
        
        chars.into_iter().collect()        
    }
}

fn main() {
    let s = "IceCreAm".to_string();
    let result = Solution::reverse_vowels(s);
    println!("{:?}", result);
    // Expect  "AceCreIm"
}

/*
fn main() {
    let s = "leetcode".to_string();
    let result = Solution::reverse_vowels(s);
    println!("{:?}", result);
    // Expect "leotcede"
}
*/