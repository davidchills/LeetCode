"""
There are several consecutive houses along a street, each of which has some money inside. 
    There is also a robber, who wants to steal money from the homes, but he refuses to steal from adjacent homes.
The capability of the robber is the maximum amount of money he steals from one house of all the houses he robbed.
You are given an integer array nums representing how much money is stashed in each house. 
    More formally, the ith house from the left has nums[i] dollars.
You are also given an integer k, representing the minimum number of houses the robber will steal from. 
    It is always possible to steal at least k houses.
Return the minimum capability of the robber out of all the possible ways to steal at least k houses.
"""
# 2560. House Robber IV
from typing import List
class Solution:
    def minCapability(self, nums: List[int], k: int) -> int:
        left = min(nums)
        right = max(nums)
        result = right
        
        while left <= right:
            mid = (left + right) // 2
            if self.canRobAtLeastK(nums, mid, k):
                result = mid
                right = mid - 1
            else:
                left = mid + 1
                
        return result
    
    def canRobAtLeastK(self, nums, capability, k):
        count = 0
        i = 0
        
        while i < len(nums):
            if nums[i] <= capability:
                count += 1
                if count == k:
                    return True
                i += 1
            i += 1
        return False
    
# Test Code
solution = Solution()
print(solution.minCapability([2,3,5,9], 2)) # Expect 5
print(solution.minCapability([2,7,9,3,1], 2)) # Expect 2