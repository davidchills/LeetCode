"""
You are given an array of positive integers nums and want to erase a subarray containing unique elements. 
The score you get by erasing the subarray is equal to the sum of its elements.
Return the maximum score you can get by erasing exactly one subarray.
An array b is called to be a subarray of a if it forms a contiguous subsequence of a, 
    that is, if it is equal to a[l],a[l+1],...,a[r] for some (l,r).
"""
# 1695. Maximum Erasure Value
from typing import List
class Solution:
    def maximumUniqueSubarray(self, nums: List[int]) -> int:
        n = len(nums)
        seen = set()
        left = 0
        currentSum = 0
        maxSum = 0
        
        for right in range(n):
            while nums[right] in seen:
                currentSum -= nums[left]
                seen.remove(nums[left])
                left += 1
            currentSum += nums[right]
            seen.add(nums[right])
            maxSum = max(maxSum, currentSum)
        
        return maxSum       

    
# Test Code
solution = Solution()
print(solution.maximumUniqueSubarray([4,2,4,5,6])) # Expect 17
print(solution.maximumUniqueSubarray([5,2,1,2,5,2,1,2,5])) # Expect 8
