"""
Description
"""
# 340. Longest Substring with At Most K Distinct Characters
from collections import defaultdict
class Solution:
    def lengthOfLongestSubstringKDistinct(self, s: str, k: int) -> int:
        n = len(s)
        seen = defaultdict(int)
        left = 0
        result = 0
        
        for right in range(n):
            seen[s[right]] += 1
            while len(seen) > k:
                seen[s[left]] -= 1
                if seen[s[left]] == 0:
                    del seen[s[left]]
                    
                left += 1
                
            result = max(result, right - left + 1)
        
        return result
    
# Test Code
solution = Solution()
print(solution.lengthOfLongestSubstringKDistinct("eceba", 2)) # Expect 3
print(solution.lengthOfLongestSubstringKDistinct("aa", 1)) # Expect 2
print(solution.lengthOfLongestSubstringKDistinct("aabcdefff", 3)) # Expect 5
print(solution.lengthOfLongestSubstringKDistinct("abc", 0)) # Expect 0
