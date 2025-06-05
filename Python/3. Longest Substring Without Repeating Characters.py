"""
Given a string s, find the length of the longest substring without repeating characters.
"""
# 3. Longest Substring Without Repeating Characters
class Solution:
    def lengthOfLongestSubstring(self, s: str) -> int:
        n = len(s)
        result = 0
        seen = set()
        left = 0
        for right in range(n):
            while s[right] in seen:
                seen.remove(s[left])
                left += 1

            seen.add(s[right])
            result = max(result, right - left + 1)
                
        return result
        
    
# Test Code
solution = Solution()
print(solution.lengthOfLongestSubstring("abcabcbb")) # Expect 3
print(solution.lengthOfLongestSubstring("bbbbb")) # Expect 1
print(solution.lengthOfLongestSubstring("pwwkew")) # Expect 3
print(solution.lengthOfLongestSubstring("")) # Expect 0
print(solution.lengthOfLongestSubstring("a")) # Expect 1
print(solution.lengthOfLongestSubstring("au")) # Expect 2
print(solution.lengthOfLongestSubstring("dvdf")) # Expect 3

