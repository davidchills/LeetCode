"""
You are given a 0-indexed array of strings words and a character x.
Return an array of indices representing the words that contain the character x.
Note that the returned array may be in any order.
"""
# 2942. Find Words Containing Character
from typing import List
class Solution:
    def findWordsContaining(self, words: List[str], x: str) -> List[int]:
        result = []
        n = len(words)
        for i in range(n):
            if x in words[i]:
                result.append(i)
                
        return result
        
    
# Test Code
solution = Solution()
print(solution.findWordsContaining(["leet","code"], "e")) # Expect [0,1]
print(solution.findWordsContaining(["abc","bcd","aaaa","cbc"], "a")) # Expect [0,2]
print(solution.findWordsContaining(["abc","bcd","aaaa","cbc"], "z")) # Expect []