"""
Given an integer array nums, return the length of the longest strictly increasing subsequence.
Follow up: Can you come up with an algorithm that runs in O(n log(n)) time complexity?
"""
# 300. Longest Increasing Subsequence
from typing import List
import bisect
class Solution:
    def lengthOfLIS(self, nums: List[int]) -> int:
        tails: List[int] = []
        for num in nums:
            index = bisect.bisect_left(tails, num)
            if index == len(tails):
                tails.append(num)
            else:
                tails[index] = num
                
        return len(tails)
        
        
# Test Code
solution = Solution()
print(solution.lengthOfLIS([10,9,2,5,3,7,101,18])) # Expect 4
print(solution.lengthOfLIS([0,1,0,3,2,3])) # Expect 4
print(solution.lengthOfLIS([7,7,7,7,7,7,7])) # Expect 1