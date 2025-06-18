"""
Given a 0-indexed integer array nums of size n, 
find the maximum difference between nums[i] and nums[j] (i.e., nums[j] - nums[i]), such that 0 <= i < j < n and nums[i] < nums[j].
Return the maximum difference. If no such i and j exists, return -1.
"""
# 2016. Maximum Difference Between Increasing Elements
from typing import List
class Solution:
    def maximumDifference(self, nums: List[int]) -> int:
        n = len(nums)
        if n < 2:
            return -1
        
        ans = -1
        runningMin = nums[0]
        for i in range(1, n):
            if nums[i] > runningMin:
                ans = max(ans, nums[i] - runningMin)
            
            runningMin = min(runningMin, nums[i])
                    
        return ans
    
# Test Code
solution = Solution()
print(solution.maximumDifference([7,1,5,4])) # Expect 4
print(solution.maximumDifference([9,4,3,2])) # Expect -1
print(solution.maximumDifference([1,5,2,10])) # Expect 9
