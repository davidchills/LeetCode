"""
Given an integer array nums, return true if you can partition the array into two subsets 
    such that the sum of the elements in both subsets is equal or false otherwise.
"""
# 416. Partition Equal Subset Sum
from typing import List
class Solution:
    def canPartition(self, nums: List[int]) -> bool:
        arraySum = sum(nums)
        if arraySum % 2 != 0:
            return False
        
        target = arraySum // 2
        dp = [False] * (target + 1)
        dp[0] = True
        for num in nums:
            for i in range(target, num - 1, -1):
                dp[i] = dp[i] or dp[i - num]
                if dp[target]:
                    break
            
        return dp[target]
        
    
# Test Code
solution = Solution()
print(solution.canPartition([1,5,11,5])) # Expect True
print(solution.canPartition([1,2,3,5])) # Expect False
