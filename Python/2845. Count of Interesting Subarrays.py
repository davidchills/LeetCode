"""
You are given a 0-indexed integer array nums, an integer modulo, and an integer k.
Your task is to find the count of subarrays that are interesting.
A subarray nums[l..r] is interesting if the following condition holds:
Let cnt be the number of indices i in the range [l, r] such that nums[i] % modulo == k. Then, cnt % modulo == k.
Return an integer denoting the count of interesting subarrays.
Note: A subarray is a contiguous non-empty sequence of elements within an array.
"""
# 2845. Count of Interesting Subarrays
from typing import List
class Solution:
    def countInterestingSubarrays(self, nums: List[int], modulo: int, k: int) -> int:
        prefixModCount = {0: 1}
        prefixSum = 0
        result = 0
        
        for num in nums:
            if num % modulo == k:
                prefixSum += 1
            remainder = prefixSum % modulo
            target = (remainder - k) % modulo
            result += prefixModCount.get(target, 0)            
            prefixModCount[remainder] = prefixModCount.get(remainder, 0) + 1
        
        return result        
        
    
# Test Code
solution = Solution()
print(solution.countInterestingSubarrays([3,2,4], 2, 1)) # Expect 3
print(solution.countInterestingSubarrays([3,1,9,6], 3, 0)) # Expect 2
