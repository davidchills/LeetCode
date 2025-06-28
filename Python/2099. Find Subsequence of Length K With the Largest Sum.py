"""
You are given an integer array nums and an integer k. You want to find a subsequence of nums of length k that has the largest sum.
Return any such subsequence as an integer array of length k.
A subsequence is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.
"""
# 2099. Find Subsequence of Length K With the Largest Sum
from typing import List
import heapq
class Solution:
    def maxSubsequence(self, nums: List[int], k: int) -> List[int]:
        indexed = sorted([(num, i) for i, num in enumerate(nums)], key=lambda x: x[0], reverse=True)
        sub = sorted(indexed[:k], key=lambda x: x[1])
        return [value for value, _ in sub]
        

    
# Test Code
solution = Solution()
print(solution.maxSubsequence([2,1,3,3], 2)) # Expect [3,3]
print(solution.maxSubsequence([-1,-2,3,4], 3)) # Expect [-1,3,4]
print(solution.maxSubsequence([3,4,3,3], 2)) # Expect [3,4]


