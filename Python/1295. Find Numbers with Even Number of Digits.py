"""
Given an array nums of integers, return how many of them contain an even number of digits.
"""
# 1295. Find Numbers with Even Number of Digits
from typing import List
class Solution:
    def findNumbers(self, nums: List[int]) -> int:
        result = 0
        for num in nums:
            if len(str(num)) % 2 == 0:
                result += 1
                
        return result
    
# Test Code
solution = Solution()
print(solution.findNumbers([12,345,2,6,7896])) # Expect 2
print(solution.findNumbers([555,901,482,1771])) # Expect 1