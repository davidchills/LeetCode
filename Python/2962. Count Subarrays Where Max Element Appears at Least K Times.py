"""
You are given an integer array nums and a positive integer k.
Return the number of subarrays where the maximum element of nums appears at least k times in that subarray.
A subarray is a contiguous sequence of elements within an array.
"""
# 2962. Count Subarrays Where Max Element Appears at Least K Times
from typing import List
class Solution:
    def countSubarrays(self, nums: List[int], k: int) -> int:
        result = 0
        left = 0
        maxValue = max(nums)
        
        for num in nums:
            if num == maxValue:
                k -= 1
            while k ==0:
                if nums[left] == maxValue:
                    k += 1
                left += 1
                
            result += left
            
        return result

            
                    
            
        
        
    
# Test Code
solution = Solution()
print(solution.countSubarrays([1,3,2,3,3], 2)) # Expect 6
print(solution.countSubarrays([1,4,2,1], 3)) # Expect 0