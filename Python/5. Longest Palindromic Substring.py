"""
Given a string s, return the longest palindromic substring in s.
"""
# 5. Longest Palindromic Substring
class Solution:
    def longestPalindrome(self, s: str) -> str:
        if not s:
            return ""
        
        def expandAroundCenter(left: int, right: int) -> int:
            while left >= 0 and right < len(s) and s[left] == s[right]:
                left -= 1
                right += 1
            return right - left - 1
        
        start, end = 0, 0
        for i in range(len(s)):
            len1 = expandAroundCenter(i, i)
            len2 = expandAroundCenter(i, i + 1)
            curr_len = max(len1, len2)
            
            if curr_len > (end - start + 1):
                start = i - (curr_len - 1) // 2
                end   = i + curr_len // 2
        
        return s[start:end + 1]
    
# Test Code
solution = Solution()
print(solution.longestPalindrome("babad")) # Expect "bab" or "aba"
print(solution.longestPalindrome("cbbd")) # Expect "bb"