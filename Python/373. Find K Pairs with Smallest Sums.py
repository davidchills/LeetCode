"""
You are given two integer arrays nums1 and nums2 sorted in non-decreasing order and an integer k.

Define a pair (u, v) which consists of one element from the first array and one element from the second array.

Return the k pairs (u1, v1), (u2, v2), ..., (uk, vk) with the smallest sums.
"""
# 373. Find K Pairs with Smallest Sums
from typing import List
import heapq
class Solution:
    def kSmallestPairs(self, nums1: List[int], nums2: List[int], k: int) -> List[List[int]]:
        if not nums1 or not nums2 or k <= 0:
            return []
        
        m, n = len(nums1), len(nums2)
        heap = []
        result = []
        
        for i in range(min(k, m)):
            heapq.heappush(heap, (nums1[i] + nums2[0], i, 0))
        
        while heap and len(result) < k:
            total, i, j = heapq.heappop(heap)
            result.append([nums1[i], nums2[j]])
            if j + 1 < n:
                heapq.heappush(heap, (nums1[i] + nums2[j + 1], i, j + 1))
        
        return result        
        
    
# Test Code
solution = Solution()
print(solution.kSmallestPairs([1,7,11], [2,4,6], 3)) # Expect [[1,2],[1,4],[1,6]]
print(solution.kSmallestPairs([1,1,2], [1,2,3], 2)) # Expect [[1,1],[1,1]]