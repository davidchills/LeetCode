"""
Given a set of distinct positive integers nums, 
    return the largest subset answer such that every pair (answer[i], answer[j]) of elements in this subset satisfies:
answer[i] % answer[j] == 0, or
answer[j] % answer[i] == 0
If there are multiple solutions, return any of them.
"""
# 368. Largest Divisible Subset
from typing import List
class Solution:
    def largestDivisibleSubset(self, nums: List[int]) -> List[int]:
        if not nums:
            return []
        n = len(nums)
        subset = []
        nums.sort()
        dp = [1] * n
        prev = [-1] * n
        max_index = 0
        for i in range(n):
            for j in range(i):
                if nums[i] % nums[j] == 0 and dp[j] + 1 > dp[i]:
                    dp[i] = dp[j] + 1
                    prev[i] = j
            if dp[i] > dp[max_index]:
                max_index = i
        i = max_index
        while i >= 0:
            subset.append(nums[i])
            i = prev[i]
        
        subset.reverse()
        return subset
                    
            
# Test Code
solution = Solution()
print(solution.largestDivisibleSubset([1,2,3])) # Expect [1,2] or [1,3]
print(solution.largestDivisibleSubset([1,2,4,8])) # Expect [1,2,4,8]