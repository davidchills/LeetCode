"""
Given an integer array nums, return true if there exists a triple of indices (i, j, k) such that i < j < k and nums[i] < nums[j] < nums[k]. 
    If no such indices exists, return false.
The pattern does not need to be contiguous. Not included in instructions.
"""
# 334. Increasing Triplet Subsequence
class Solution(object):
    def increasingTriplet(self, nums: list[int]) -> bool:
        if len(nums) < 3:
            return False
        
        first = float('inf')
        second = float('inf')
        
        for num in nums:
            if num <= first:
                first = num
            elif num <= second:
                second = num
            else:
                return True
            
        return False
    
# Test Code
solution = Solution()
#print(solution.increasingTriplet([1,2,3,4,5])) # Expect True
print(solution.increasingTriplet([5,4,3,2,1])) # Expect false
#print(solution.increasingTriplet([2,1,5,0,4,6])) # Expect True
#print(solution.increasingTriplet([20,100,10,12,5,13])) # Expect True
#print(solution.increasingTriplet([1,2,0,3])) # Expect True