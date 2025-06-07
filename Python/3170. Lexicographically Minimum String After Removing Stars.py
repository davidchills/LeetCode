"""
You are given a string s. It may contain any number of '*' characters. Your task is to remove all '*' characters.
While there is a '*', do the following operation:
• Delete the leftmost '*' and the smallest non-'*' character to its left. If there are several smallest characters, you can delete any of them.
Return the lexicographically smallest resulting string after removing all '*' characters.
"""
# 3170. Lexicographically Minimum String After Removing Stars
from typing import List
import heapq
class Solution:
    def clearStars(self, s: str) -> str:
        n = len(s)
        result = [''] * n
        heap = []
        
        for idx, char in enumerate(s):
            if char == '*':
                heapq.heappop(heap)
            else:
                heapq.heappush(heap, (char, -idx))
                
        while heap:
            char, idx = heapq.heappop(heap)
            result[-idx] = char
            
        return ''.join(result)
                
        
    
# Test Code
solution = Solution()
print(solution.clearStars("aaba*")) # Expect "aab"
print(solution.clearStars("abc")) # Expect "abc"
