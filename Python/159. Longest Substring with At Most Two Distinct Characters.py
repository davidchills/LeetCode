"""
Given a string s, return the length of the longest substring that contains at most two distinct characters.
"""
# 159. Longest Substring with At Most Two Distinct Characters
from collections import defaultdict
class Solution:
    def lengthOfLongestSubstringTwoDistinct(self, s: str) -> int:
        n = len(s)
        if n < 3:
            return n
        
        seen = defaultdict(int)
        left = 0
        result = 0
        
        for right in range(n):
            seen[s[right]] += 1
            while len(seen) > 2:
                seen[s[left]] -= 1
                if seen[s[left]] == 0:
                    del seen[s[left]]
                    
                left += 1
                
            result = max(result, right - left + 1)
                
        return result
        
        
    
# Test Code
solution = Solution()
print(solution.lengthOfLongestSubstringTwoDistinct("eceba")) # Expect 3
print(solution.lengthOfLongestSubstringTwoDistinct("ccaabbb")) # Expect 5
print(solution.lengthOfLongestSubstringTwoDistinct("abcabcabc")) # Expect 2
print(solution.lengthOfLongestSubstringTwoDistinct("a")) # Expect 1
print(solution.lengthOfLongestSubstringTwoDistinct("")) # Expect 0