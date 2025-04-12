"""
Given an integer array nums where every element appears three times except for one, which appears exactly once. 
Find the single element and return it.
You must implement a solution with a linear runtime complexity and use only constant extra space.
"""
# 137. Single Number II
from typing import List
class Solution:
    def singleNumber(self, nums: List[int]) -> int:
        # not using bit manipulation
        return (3 * sum(set(nums)) - sum(nums)) // 2
    
# Test Code
solution = Solution()
print(solution.singleNumber([2,2,3,2])) # Expect 3
print(solution.singleNumber([0,1,0,1,0,1,99])) # Expect 99