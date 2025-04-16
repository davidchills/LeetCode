"""
Given an integer array nums and an integer k, return the number of good subarrays of nums.
A subarray arr is good if there are at least k pairs of indices (i, j) such that i < j and arr[i] == arr[j].
A subarray is a contiguous non-empty sequence of elements within an array.
"""
# 2537. Count the Number of Good Subarrays
from typing import List
from collections import defaultdict
class Solution:
    def countGood(self, nums: List[int], k: int) -> int:
        freq = defaultdict(int)
        left = 0
        count = 0  # Number of good pairs in current window
        result = 0

        for right in range(len(nums)):
            count += freq[nums[right]]
            freq[nums[right]] += 1

            while count >= k:
                result += len(nums) - right
                freq[nums[left]] -= 1
                count -= freq[nums[left]]
                left += 1

        return result        
        
    
# Test Code
solution = Solution()
print(solution.countGood([1,1,1,1,1], 10)) # Expect 1
print(solution.countGood([3,1,4,3,2,2,4], 2)) # Expect 4