"""
Given a non-empty array of integers nums, every element appears twice except for one. Find that single one.
You must implement a solution with a linear runtime complexity and use only constant extra space.
Hint: Think about the XOR (^) operator's property.
"""
# 136. Single Number
from typing import List
class Solution:
    def singleNumber(self, nums: List[int]) -> int:
        result = 0
        for num in nums:
            result ^= num
        return result
        
# Test Code
solution = Solution()
print(solution.singleNumber([2,2,1])) # Expect 1
print(solution.singleNumber([4,1,2,1,2])) # Expect 4
print(solution.singleNumber([1])) # Expect 1