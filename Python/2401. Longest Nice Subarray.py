"""
You are given an array nums consisting of positive integers.
We call a subarray of nums nice if the bitwise AND of every pair of elements that are in different positions in the subarray is equal to 0.
Return the length of the longest nice subarray.
A subarray is a contiguous part of an array.
Note that subarrays of length 1 are always considered nice.

"""
# 2401. Longest Nice Subarray
from typing import List
class Solution:
    def longestNiceSubarray(self, nums: List[int]) -> int:
        left = 0
        currAND = 0
        maxLength = 0
    
        for right in range(len(nums)):
            while (currAND & nums[right]) != 0:
                currAND ^= nums[left]
                left += 1
            currAND |= nums[right]
            maxLength = max(maxLength, right - left + 1)
    
        return maxLength
    
# Test Code
solution = Solution()
print(solution.longestNiceSubarray([1, 3, 8, 48, 10]))  # Expect 3
print(solution.longestNiceSubarray([3, 1, 5, 11, 13]))  # Expect 1