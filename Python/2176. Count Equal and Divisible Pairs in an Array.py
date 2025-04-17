"""
Given a 0-indexed integer array nums of length n and an integer k, 
    return the number of pairs (i, j) where 0 <= i < j < n, such that nums[i] == nums[j] and (i * j) is divisible by k.
"""
# 2176. Count Equal and Divisible Pairs in an Array
from typing import List
class Solution:
    def countPairs(self, nums: List[int], k: int) -> int:
        n = len(nums)
        result = 0
        for i in range(n):
            for j in range(i + 1, n):
                if nums[i] == nums[j] and (i * j) % k == 0:
                    result += 1
                    
        return result
        
    
# Test Code
solution = Solution()
print(solution.countPairs([3,1,2,2,2,1,3], 2)) # Expect 4
print(solution.countPairs([1,2,3,4], 1)) # Expect 0
