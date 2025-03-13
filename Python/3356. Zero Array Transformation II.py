"""
You are given an integer array nums of length n and a 2D array queries where queries[i] = [li, ri, vali].
Each queries[i] represents the following action on nums:
Decrement the value at each index in the range [li, ri] in nums by at most vali.
The amount by which each value is decremented can be chosen independently for each index.
A Zero Array is an array with all its elements equal to 0.
Return the minimum possible non-negative value of k, such that after processing the first k queries in sequence, nums becomes a Zero Array. 
    If no such k exists, return -1.
"""
# 3356. Zero Array Transformation II
from typing import List
class Solution:
    def minZeroArray(self, nums: List[int], queries: List[List[int]]) -> int:
        n = len(nums)
        left = 0
        right = len(queries)
        result = -1
        
        while left <= right:
            mid = (left + right) // 2
            if self.canZeroArray(nums, queries, mid):
                result = mid
                right = mid - 1
                
            else:
                left = mid + 1
                
        return result
    
    def canZeroArray(self, nums, queries, k):
        n = len(nums)
        diff = [0] * (n + 1)
        
        for i in range(k):
            l, r, val = queries[i]
            diff[l] -= val
            diff[r + 1] += val
            
        currentDecrement = 0
        for i in range(n):
            currentDecrement += diff[i]
            if nums[i] + currentDecrement > 0:
                return False
            
        return True

    
# Test Code
solution = Solution()
print(solution.minZeroArray([2,0,2], [[0,2,1],[0,2,1],[1,1,3]])) # Expect 2
print(solution.minZeroArray([4,3,2,1], [[1,3,2],[0,2,1]])) # Expect -1