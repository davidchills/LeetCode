"""
You are given a binary array nums.
You can do the following operation on the array any number of times (possibly zero):
Choose any 3 consecutive elements from the array and flip all of them.
Flipping an element means changing its value from 0 to 1, and from 1 to 0.
Return the minimum number of operations required to make all elements in nums equal to 1. If it is impossible, return -1.
"""
# 3191. Minimum Operations to Make Binary Array Elements Equal to One I
from typing import List
class Solution:
    def minOperations(self, nums: List[int]) -> int:
        n = len(nums)
        flips = 0

        for i in range(n - 2):
            if nums[i] == 0:
                for j in range(3):
                    nums[i + j] ^= 1
                flips += 1

        if any(num == 0 for num in nums):
            return -1

        return flips
    
# Test Code
solution = Solution()
print(solution.minOperations([0,1,1,1,0,0])) # Expect 3
print(solution.minOperations([0,1,1,1])) # Expect -1