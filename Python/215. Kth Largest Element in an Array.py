"""
Given an integer array nums and an integer k, return the kth largest element in the array.
Note that it is the kth largest element in the sorted order, not the kth distinct element.
Can you solve it without sorting?
"""
# 215. Kth Largest Element in an Array
import heapq
class Solution:
    def findKthLargest(self, nums: list[int], k: int) -> int:
        min_heap = []
        for num in nums:
            heapq.heappush(min_heap, num)
            if len(min_heap) > k:
                heapq.heappop(min_heap)
                
        return heapq.heappop(min_heap)
        
    
# Test Code
solution = Solution()
#print(solution.findKthLargest([3,2,1,5,6,4], 2)) # Expect 5
print(solution.findKthLargest([3,2,3,1,2,4,5,5,6], 4)) # Expect 4