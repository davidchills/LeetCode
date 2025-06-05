"""
Given two strings s and t of lengths m and n respectively, 
    return the minimum window substring of s such that every character in t (including duplicates) is included in the window. 
If there is no such substring, return the empty string "".
The testcases will be generated such that the answer is unique.
"""
# 76. Minimum Window Substring
from collections import Counter, defaultdict
class Solution:
    def minWindow(self, s: str, t: str) -> str:
        if not s or not t:
            return ""
        
        n = len(s)
        result = ""
        left = 0
        formed = 0
        minLength = -1
        required = Counter(t)
        windowFrequency = defaultdict(int)

        for right in range(n):
            char = s[right]
            windowFrequency[char] += 1
            if char in required and windowFrequency[char] == required[char]:
                formed += 1
                
            while formed == len(required):
                windowLength = right - left + 1
                if minLength == -1 or windowLength < minLength:
                    minLength = windowLength
                    result = s[left:right + 1]
            
                windowFrequency[s[left]] -= 1
                if s[left] in required and windowFrequency[s[left]] < required[s[left]]:
                    formed -= 1
                    
                left += 1
                            
        return result
            
            
# Test Code
solution = Solution()
print(solution.minWindow("ADOBECODEBANC", "ABC")) # Expect "BANC"
print(solution.minWindow("a", "a")) # Expect "a"
print(solution.minWindow("a", "aa")) # Expect ""