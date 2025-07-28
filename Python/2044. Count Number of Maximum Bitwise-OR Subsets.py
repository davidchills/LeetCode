"""
Given an integer array nums, find the maximum possible bitwise OR of a subset of nums 
    and return the number of different non-empty subsets with the maximum bitwise OR.
An array a is a subset of an array b if a can be obtained from b by deleting some (possibly zero) elements of b. 
Two subsets are considered different if the indices of the elements chosen are different.
The bitwise OR of an array a is equal to a[0] OR a[1] OR ... OR a[a.length - 1] (0-indexed).
"""
# 2044. Count Number of Maximum Bitwise-OR Subsets
from typing import List
class Solution:
    def countMaxOrSubsets(self, nums: List[int]) -> int:
        # 1) Compute the maximum possible OR over the entire array
        max_or = 0
        for num in nums:
            max_or |= num

        # 2) dp[or_val] = number of subsets whose OR is or_val
        dp = {0: 1}  # one way to get OR = 0: the empty subset
        for num in nums:
            new_dp = dp.copy()
            for or_val, cnt in dp.items():
                new_or = or_val | num
                new_dp[new_or] = new_dp.get(new_or, 0) + cnt
            dp = new_dp

        # 3) Return the count of (possibly non-empty) subsets whose OR equals max_or
        return dp.get(max_or, 0)       

    
# Test Code
solution = Solution()
print(solution.countMaxOrSubsets([3,1])) # Expect 2
print(solution.countMaxOrSubsets([2,2,2])) # Expect 7
print(solution.countMaxOrSubsets([3,2,1,5])) # Expect 6
