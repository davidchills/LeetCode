"""
You are given an integer array nums and two integers minK and maxK.
A fixed-bound subarray of nums is a subarray that satisfies the following conditions:
The minimum value in the subarray is equal to minK.
The maximum value in the subarray is equal to maxK.
Return the number of fixed-bound subarrays.
A subarray is a contiguous part of an array.
"""
# 2444. Count Subarrays With Fixed Bounds
from typing import List
class Solution:
    def countSubarrays(self, nums: List[int], minK: int, maxK: int) -> int:
        result = 0
        leftBound = -1
        lastMin = -1
        lastMax = -1
        
        # Iterate through the array
        for i in range(len(nums)):
            # If current number is out of range, update the left bound
            if nums[i] < minK or nums[i] > maxK:
                leftBound = i
            
            # Update the positions of minK and maxK
            if nums[i] == minK:
                lastMin = i
            if nums[i] == maxK:
                lastMax = i
            
            # Calculate the count of valid subarrays ending at position i
            # The valid subarrays must contain both minK and maxK
            # And start after the leftBound
            validSubarrays = min(lastMin, lastMax) - leftBound if min(lastMin, lastMax) > leftBound else 0
            result += validSubarrays
        
        return result        
        
    
# Test Code
solution = Solution()
print(solution.countSubarrays([1,3,5,2,7,5], 1, 5)) # Expect 2
print(solution.countSubarrays([1,1,1,1], 1, 1)) # Expect 10