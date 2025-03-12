"""
Given an array nums sorted in non-decreasing order, 
    return the maximum between the number of positive integers and the number of negative integers.
In other words, if the number of positive integers in nums is pos and the number of negative integers is neg, then return the maximum of pos and neg.
Note that 0 is neither positive nor negative.
"""
# 2529. Maximum Count of Positive Integer and Negative Integer
from typing import List
class Solution:
    def maximumCount(self, nums: List[int]) -> int:
        n = len(nums)
        low = 0
        high = n - 1
        
        while low <= high:
            mid = (low + high) // 2
            if nums[mid] < 0:
                low = mid + 1
            else:
                high = mid - 1
                
        negs = low
        
        low = 0
        high = n - 1
        while low <= high:
            mid = (low + high) // 2
            if nums[mid] <= 0:
                low = mid + 1
            else:
                high = mid - 1
                
        pos = n - low
        
        return max(negs, pos)

    
# Test Code
solution = Solution()
print(solution.maximumCount([-2,-1,-1,1,2,3])) # Expect 3
print(solution.maximumCount([-3,-2,-1,0,0,1,2])) # Expect 3
print(solution.maximumCount([5,20,66,1314])) # Expect 3