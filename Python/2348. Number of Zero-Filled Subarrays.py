"""
Given an integer array nums, return the number of subarrays filled with 0.
A subarray is a contiguous non-empty sequence of elements within an array.
"""
# 2348. Number of Zero-Filled Subarrays
from typing import List
class Solution:
    def zeroFilledSubarray(self, nums: List[int]) -> int:
        count = 0
        total = 0
        
        for num in nums:
            if num == 0:
                count += 1
                total += count
            else:
                count = 0
        
        return total

    
# Test Code
solution = Solution()
print(solution.zeroFilledSubarray([1,3,0,0,2,0,0,4])) # Expect 6
print(solution.zeroFilledSubarray([0,0,0,2,0,0])) # Expect 9
print(solution.zeroFilledSubarray([2,10,2019])) # Expect 0
