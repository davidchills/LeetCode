"""
You are given a 0-indexed integer array nums and an integer p. 
Find p pairs of indices of nums such that the maximum difference amongst all the pairs is minimized. 
Also, ensure no index appears more than once amongst the p pairs.
Note that for a pair of elements at the index i and j, the difference of this pair is |nums[i] - nums[j]|, 
    where |x| represents the absolute value of x.
Return the minimum maximum difference among all p pairs. We define the maximum of an empty set to be zero.
"""
# 2616. Minimize the Maximum Difference of Pairs
from typing import List
class Solution:
    def minimizeMax(self, nums: List[int], p: int) -> int:
        if p == 0:
            return 0
        nums.sort()
        
        def checkForPairs(diff: int) -> bool:
            count = 0
            i = 1
            n = len(nums)
            while i < n:
                if nums[i] - nums[i - 1] <= diff:
                    count += 1
                    i += 2
                else:
                    i += 1
                if count >= p:
                    return True
            return False
            
        left = 0
        right = nums[-1] - nums[0]
        
        while left <= right:
            mid = (left + right) // 2
            if checkForPairs(mid):
                right = mid - 1
            else:
                left = mid + 1
                
        return left
    
# Test Code
solution = Solution()
print(solution.minimizeMax([10,1,2,7,1,3], 2)) # Expect 1
print(solution.minimizeMax([4,2,1,2], 1)) # Expect 0