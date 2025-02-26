"""
Given two strings s and t, return true if s is a subsequence of t, or false otherwise.

A subsequence of a string is a new string that is formed from the original string by deleting some (can be none) 
    of the characters without disturbing the relative positions of the remaining characters. 
    (i.e., "ace" is a subsequence of "abcde" while "aec" is not).
"""
# 392. Is Subsequence
class Solution:
    def isSubsequence(self, s: str, t: str) -> bool:
        if s == "" or s == t:
            return True
        
        it = iter(t)
        return all(char in it for char in s)
    
# Test Code
solution = Solution()
#s = "abc"
#t = "ahbgdc"
# Expect True

s = "aaaaaa"
t = "bbaaaa"
# Expect False
print(solution.isSubsequence(s, t))