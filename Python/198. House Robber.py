"""
You are a professional robber planning to rob houses along a street. 
Each house has a certain amount of money stashed, 
the only constraint stopping you from robbing each of them is that adjacent houses have security systems connected and 
it will automatically contact the police if two adjacent houses were broken into on the same night.
Given an integer array nums representing the amount of money of each house, 
return the maximum amount of money you can rob tonight without alerting the police.
"""
# 198. House Robber 
from typing import List
class Solution:
    def rob(self, nums: List[int]) -> int:
        n = len(nums)
        if n == 0:
            return 0
        if n == 1:
            return nums[0]
        
        previous2 = 0
        previous1 = nums[0]

        for i in range(1, n):
            current = max(previous1, previous2 + nums[i])
            previous2 = previous1
            previous1 = current
        
        return previous1
    
# Test Code
solution = Solution()
print(solution.rob([1,2,3,1])) # Expect 4
print(solution.rob([2,7,9,3,1])) # Expect 12
