"""
Given a circular array nums, find the maximum absolute difference between adjacent elements.
Note: In a circular array, the first and last elements are adjacent.
"""
# 3423. Maximum Difference Between Adjacent Elements in a Circular Array
from typing import List
class Solution:
    def maxAdjacentDistance(self, nums: List[int]) -> int:
        n = len(nums)
        maxDiff = 0
        for i in range(n):
            j = (i + 1) % n
            maxDiff = max(maxDiff, abs(nums[i] - nums[j]))
            
        return maxDiff
    
# Test Code
solution = Solution()
print(solution.maxAdjacentDistance([1,2,4])) # Expect 3
print(solution.maxAdjacentDistance([-5,-10,-5])) # Expect 5
print(solution.maxAdjacentDistance([-4,-2,-3])) # Expect 2
