"""
You are given a string s. We want to partition the string into as many parts as possible so that each letter appears in at most one part. 
    For example, the string "ababcc" can be partitioned into ["abab", "cc"], 
    but partitions such as ["aba", "bcc"] or ["ab", "ab", "cc"] are invalid.
Note that the partition is done so that after concatenating all the parts in order, the resultant string should be s.
Return a list of integers representing the size of these parts.
"""
# 763. Partition Labels
from typing import List
class Solution:
    def partitionLabels(self, s: str) -> List[int]:
        n = len(s)
        lastOccurrence = {c: i for i, c in enumerate(s)}
        partitions = []

            
        start = 0
        end = 0
        for i in range(0, n):
            end = max(end, lastOccurrence[s[i]])
            if i == end:
                partitions.append(end - start + 1)
                start = i + 1
                
        return partitions
        
    
# Test Code
solution = Solution()
print(solution.partitionLabels("ababcbacadefegdehijhklij")) # Expect [9,7,8]
print(solution.partitionLabels("eccbbbbdec")) # Expect [10]