"""
Given a 0-indexed integer array nums of size n and two integers lower and upper, return the number of fair pairs.
A pair (i, j) is fair if:
0 <= i < j < n, and
lower <= nums[i] + nums[j] <= upper
"""
# 2563. Count the Number of Fair Pairs
from typing import List
import bisect
class Solution:
    def countFairPairs(self, nums: List[int], lower: int, upper: int) -> int:
        n = len(nums)
        nums.sort()
        count = 0
        
        for i, x in enumerate(nums):
            loVal = lower - x
            hiVal = upper - x
            left = bisect.bisect_left(nums, loVal, i + 1, n)
            right = bisect.bisect_right(nums, hiVal, i + 1, n)            
            count += (right - left)
        
        return count        
        
# Test Code
solution = Solution()
print(solution.countFairPairs([0,1,7,4,4,5], 3, 6)) # Expect 6
print(solution.countFairPairs([1,7,9,2,5], 11, 11)) # Expect 1