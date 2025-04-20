/*
Given a string s, return the longest palindromic substring in s.
    
5. Longest Palindromic Substring    
*/
class Solution {
    func longestPalindrome(_ s: String) -> String {
        let chars = Array(s)
        let n = chars.count
        if n < 2 { return s }
        var start = 0 
        var end = 0

        // Expand around center and return length of palindrome
        func expandSequence(_ left: Int, _ right: Int) -> Int {
            var left = left 
            var right = right
            while left >= 0 && right < n && chars[left] == chars[right] {
                left -= 1
                right += 1
            }
            return right - left - 1
        }

        for i in 0..<n {
            let len1 = expandSequence(i, i)
            let len2 = expandSequence(i, i + 1)
            let len = max(len1, len2)
            if len > end - start + 1 {
                start = i - (len - 1) / 2
                end   = i + len / 2
            }
        }

        return String(chars[start...end])        
    }
}
let solution = Solution()
print(solution.longestPalindrome("babad")) // Expect "bab" or "aba"
print(solution.longestPalindrome("cbbd"))  // Expect "bb"