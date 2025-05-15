"""
You are given a string array words and a binary array groups both of length n, where words[i] is associated with groups[i].
Your task is to select the longest alternating subsequence from words. 
A subsequence of words is alternating if for any two consecutive strings in the sequence, 
    their corresponding elements in the binary array groups differ. 
Essentially, you are to choose strings such that adjacent elements have non-matching corresponding bits in the groups array.
Formally, you need to find the longest subsequence of an array of indices [0, 1, ..., n - 1] denoted as [i0, i1, ..., ik-1], 
    such that groups[ij] != groups[ij+1] for each 0 <= j < k - 1 and then find the words corresponding to these indices.
Return the selected subsequence. If there are multiple answers, return any of them.
Note: The elements in words are distinct.
"""
# 2900. Longest Unequal Adjacent Groups Subsequence I
from typing import List
class Solution:
    def getLongestSubsequence(self, words: List[str], groups: List[int]) -> List[str]:
        if not words or not groups or len(words) != len(groups):
            return []
        
        result = [words[0]]
        last_group = groups[0]
        
        for w, g in zip(words[1:], groups[1:]):
            if g != last_group:
                result.append(w)
                last_group = g
        
        return result        
        
    
# Test Code
solution = Solution()
print(solution.getLongestSubsequence(["e","a","b"], [0,0,1])) # Expect ["e","b"]
print(solution.getLongestSubsequence(["a","b","c","d"], [1,0,1,1])) # Expect ["a","b","c"]