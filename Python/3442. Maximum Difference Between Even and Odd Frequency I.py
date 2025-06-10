"""
You are given a string s consisting of lowercase English letters.
Your task is to find the maximum difference diff = a1 - a2 between the frequency of characters a1 and a2 in the string such that:
a1 has an odd frequency in the string.
a2 has an even frequency in the string.
Return this maximum difference.
"""
# 3442. Maximum Difference Between Even and Odd Frequency I
from collections import Counter
class Solution:
    def maxDifference(self, s: str) -> int:
        letterCount = Counter(s)
        odd = -1
        even = float('inf')
        for freq in letterCount.values():
            if freq % 2 == 0:
                even = min(even, freq)
            else:
                odd = max(odd, freq)
        
        return odd - even
        
    
# Test Code
solution = Solution()
print(solution.maxDifference("aaaaabbc")) # Expect 3
print(solution.maxDifference("abcabcab")) # Expect 1

