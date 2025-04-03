"""
You are given a 0-indexed integer array nums.
Return the maximum value over all triplets of indices (i, j, k) such that i < j < k. If all such triplets have a negative value, return 0.
The value of a triplet of indices (i, j, k) is equal to (nums[i] - nums[j]) * nums[k].
"""
# 2874. Maximum Value of an Ordered Triplet II
from typing import List
class Solution:
    def maximumTripletValue(self, nums: List[int]) -> int:
        n = len(nums)
        if n < 3:
            return 0
        
        # Build prefix maximum array
        prefixMax = [0] * n
        prefixMax[0] = nums[0]
        for i in range(1, n):
            prefixMax[i] = max(prefixMax[i-1], nums[i])
        
        # Build suffix maximum array
        suffixMax = [0] * n
        suffixMax[n-1] = nums[n-1]
        for i in range(n-2, -1, -1):
            suffixMax[i] = max(suffixMax[i+1], nums[i])
        
        maxValue = float('-inf')
        for j in range(1, n-1):
            candidate = (prefixMax[j-1] - nums[j]) * suffixMax[j+1]
            maxValue = max(maxValue, candidate)
        
        return max(maxValue, 0)
    
# Test Code
solution = Solution()
print(solution.maximumTripletValue([12,6,1,2,7])) # Expect 77
print(solution.maximumTripletValue([1,10,3,4,19])) # Expect 133
print(solution.maximumTripletValue([1,2,3])) # Expect 0