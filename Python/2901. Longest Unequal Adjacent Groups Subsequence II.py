"""
You are given a string array words, and an array groups, both arrays having length n.
The hamming distance between two strings of equal length is the number of positions at which the corresponding characters are different.
You need to select the longest subsequence from an array of indices [0, 1, ..., n - 1], 
    such that for the subsequence denoted as [i0, i1, ..., ik-1] having length k, the following holds:
For adjacent indices in the subsequence, their corresponding groups are unequal, i.e., groups[ij] != groups[ij+1], for each j 
    where 0 < j + 1 < k.
words[ij] and words[ij+1] are equal in length, and the hamming distance between them is 1, where 0 < j + 1 < k, 
    for all indices in the subsequence.
Return a string array containing the words corresponding to the indices (in order) in the selected subsequence. 
If there are multiple answers, return any of them.
Note: strings in words may be unequal in length.
"""
# 2901. Longest Unequal Adjacent Groups Subsequence II
from typing import List
class Solution:
    def getWordsInLongestSubsequence(self, words: List[str], groups: List[int]) -> List[str]:
        n = len(words)
        dp = [1] * n
        parent = [-1] * n
        
        def hamming1(a: str, b: str) -> bool:
            if len(a) != len(b):
                return False
            diffs = 0
            for x, y in zip(a, b):
                if x != y:
                    diffs += 1
                    if diffs > 1:
                        return False
            return diffs == 1
        
        best_len = 0
        best_end = 0
        
        for i in range(n):
            for j in range(i):
                if groups[j] != groups[i] and hamming1(words[j], words[i]):
                    if dp[j] + 1 > dp[i]:
                        dp[i] = dp[j] + 1
                        parent[i] = j
            # prefer later index on ties
            if dp[i] > best_len or (dp[i] == best_len and i > best_end):
                best_len = dp[i]
                best_end = i
        
        seq = []
        cur = best_end
        while cur != -1:
            seq.append(words[cur])
            cur = parent[cur]
        return seq[::-1]
        
    
# Test Code
solution = Solution()
print(solution.getWordsInLongestSubsequence(["bab","dab","cab"], [1,2,2])) # Expect ["bab","cab"]
print(solution.getWordsInLongestSubsequence(["a","b","c","d"], [1,2,3,4])) # Expect ["a","b","c","d"]