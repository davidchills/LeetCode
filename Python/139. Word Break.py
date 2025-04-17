"""
Given a string s and a dictionary of strings wordDict, 
    return true if s can be segmented into a space-separated sequence of one or more dictionary words.
Note that the same word in the dictionary may be reused multiple times in the segmentation.
"""
# 139. Word Break
from typing import List
class Solution:
    def wordBreak(self, s: str, wordDict: List[str]) -> bool:
        wordSet = set(wordDict)
        n = len(s)
        dp = [False] * (n + 1)
        dp[0] = True
        
        # For each position i, if dp[i] is True, try extending by each word
        for i in range(n):
            if not dp[i]:
                continue
            for word in wordSet:
                end = i + len(word)
                # If word fits starting at i and matches s[i:end], mark dp[end]
                if end <= n and s[i:end] == word:
                    dp[end] = True
            # Early exit if we've already reached the end
            if dp[n]:
                return True
        
        return dp[n]        
        
    
# Test Code
solution = Solution()
print(solution.wordBreak("leetcode", ["leet","code"])) # Expect True
print(solution.wordBreak("applepenapple", ["apple","pen"])) # Expect True
print(solution.wordBreak("catsandog", ["cats","dog","sand","and","cat"])) # Expect False