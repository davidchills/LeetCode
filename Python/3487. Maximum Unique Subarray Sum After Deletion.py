"""
You are given an integer array nums.
You are allowed to delete any number of elements from nums without making it empty. 
After performing the deletions, select a subarray of nums such that:
All elements in the subarray are unique.
The sum of the elements in the subarray is maximized.
Return the maximum sum of such a subarray.
"""
# 3487. Maximum Unique Subarray Sum After Deletion
from typing import List
class Solution:
    def maxSum(self, nums: List[int]) -> int:
        unique = set(nums)
        sumPos = sum(v for v in unique if v > 0)
        if sumPos > 0:
            return sumPos

        return max(nums)       

    
# Test Code
solution = Solution()
print(solution.maxSum([1,2,3,4,5])) # Expect 15
print(solution.maxSum([1,1,0,1,1])) # Expect 1
print(solution.maxSum([1,2,-1,-2,1,0,-1])) # Expect 3
