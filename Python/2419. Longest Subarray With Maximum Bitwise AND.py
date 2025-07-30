"""
You are given an integer array nums of size n.
Consider a non-empty subarray from nums that has the maximum possible bitwise AND.
In other words, let k be the maximum value of the bitwise AND of any subarray of nums. 
Then, only subarrays with a bitwise AND equal to k should be considered.
Return the length of the longest such subarray.
The bitwise AND of an array is the bitwise AND of all the numbers in it.
A subarray is a contiguous sequence of elements within an array.
"""
# 2419. Longest Subarray With Maximum Bitwise AND
from typing import List
class Solution:
    def longestSubarray(self, nums: List[int]) -> int:
        k = max(nums)
        max_len = curr = 0
        for x in nums:
            if x == k:
                curr += 1
                if curr > max_len:
                    max_len = curr
            else:
                curr = 0
        return max_len       

    
# Test Code
solution = Solution()
print(solution.longestSubarray([1,2,3,3,2,2])) # Expect 2
print(solution.longestSubarray([1,2,3,4])) # Expect 1
