"""
You are given two 0-indexed integer arrays nums1 and nums2 of equal length n and a positive integer k. 
You must choose a subsequence of indices from nums1 of length k.
For chosen indices i0, i1, ..., ik - 1, your score is defined as:
The sum of the selected elements from nums1 multiplied with the minimum of the selected elements from nums2.
It can defined simply as: (nums1[i0] + nums1[i1] +...+ nums1[ik - 1]) * min(nums2[i0] , nums2[i1], ... ,nums2[ik - 1]).
Return the maximum possible score.
A subsequence of indices of an array is a set that can be derived from the set {0, 1, ..., n-1} by deleting some or no elements.
"""
# 2542. Maximum Subsequence Score
from typing import List
import heapq
class Solution:
    def maxScore(self, nums1: List[int], nums2: List[int], k: int) -> int:
        pairs = list(zip(nums1, nums2))
        pairs.sort(key=lambda x: x[1], reverse=True)
        
        heap = []
        sum_nums1 = 0
        max_score = 0
        
        for a, b in pairs:
            heapq.heappush(heap, a)
            sum_nums1 += a
            if len(heap) > k:
                sum_nums1 -= heapq.heappop(heap)
            if len(heap) == k:
                max_score = max(max_score, sum_nums1 * b)
                
        return max_score    
    
# Test Code
solution = Solution()
print(solution.maxScore([1,3,3,2], [2,1,3,4], 3)) # Expect 12
print(solution.maxScore([4,2,3,1,1], [7,5,10,9,6], 1)) # Expect 30