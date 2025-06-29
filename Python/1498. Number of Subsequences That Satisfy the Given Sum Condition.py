"""
You are given an array of integers nums and an integer target.
Return the number of non-empty subsequences of nums such that the sum of the minimum and maximum element on it is less or equal to target. 
Since the answer may be too large, return it modulo 109 + 7.
"""
# 1498. Number of Subsequences That Satisfy the Given Sum Condition
from typing import List
class Solution:
    def numSubseq(self, nums: List[int], target: int) -> int:
        MOD = 10**9 + 7
        nums.sort()
        n = len(nums)
        ans = 0
        left = 0
        right = n - 1
        while left <= right :
            if nums[left] + nums[right] > target:
                right -= 1
            else:
                ans += pow(2, right - left, MOD)
                left += 1
                
        return ans % MOD
    

    
# Test Code
solution = Solution()
print(solution.numSubseq([3,5,6,7], 9)) # Expect 4
print(solution.numSubseq([3,3,6,8], 10)) # Expect 6
print(solution.numSubseq([2,3,3,4,6,7], 12)) # Expect 61
