"""
You are given an integer array nums of length n and a 2D array queries, where queries[i] = [li, ri].
For each queries[i]:
Select a subset of indices within the range [li, ri] in nums.
Decrement the values at the selected indices by 1.
A Zero Array is an array where all elements are equal to 0.
Return true if it is possible to transform nums into a Zero Array after processing all the queries sequentially, otherwise return false.
"""
# 3355. Zero Array Transformation I
from typing import List
class Solution:
    def isZeroArray(self, nums: List[int], queries: List[List[int]]) -> bool:
        n = len(nums)
        diff = [0] * (n + 1)
        coverage = [0] * n
        curr = 0
        
        for l, r in queries:
            diff[l] += 1
            if r + 1 < len(diff):
                diff[r + 1] -= 1
        
        for i in range(n):
            curr += diff[i]
            coverage[i] = curr
        
        for i in range(n):
            if coverage[i] < nums[i]:
                return False
            
        return True
    
    
    
# Test Code
solution = Solution()
print(solution.isZeroArray([1,0,1], [[0,2]])) # Expect True
print(solution.isZeroArray([4,3,2,1], [[1,3],[0,2]])) # Expect False
