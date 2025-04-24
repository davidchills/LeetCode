"""
You are given an array nums consisting of positive integers.
We call a subarray of an array complete if the following condition is satisfied:
The number of distinct elements in the subarray is equal to the number of distinct elements in the whole array.
Return the number of complete subarrays.
A subarray is a contiguous non-empty part of an array.
"""
# 2799. Count Complete Subarrays in an Array
from typing import List
class Solution:
    def countCompleteSubarrays(self, nums: List[int]) -> int:
        n = len(nums)
        totalDistinct = len(set(nums))
        freq = {}
        distinctInWindow = 0
        result = 0
        right = 0
        
        for left in range(n):
            while right < n and distinctInWindow < totalDistinct:
                if freq.get(nums[right], 0) == 0:
                    distinctInWindow += 1
                freq[nums[right]] = freq.get(nums[right], 0) + 1
                right += 1
            
            if distinctInWindow == totalDistinct:
                result += n - right + 1
            
            freq[nums[left]] -= 1
            if freq[nums[left]] == 0:
                distinctInWindow -= 1
        
        return result        
    
# Test Code
solution = Solution()
print(solution.countCompleteSubarrays([1,3,1,2,2])) # Expect 4
print(solution.countCompleteSubarrays([5,5,5,5])) # Expect 10