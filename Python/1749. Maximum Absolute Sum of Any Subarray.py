"""
You are given an integer array nums. 
    The absolute sum of a subarray [numsl, numsl+1, ..., numsr-1, numsr] is abs(numsl + numsl+1 + ... + numsr-1 + numsr).
Return the maximum absolute sum of any (possibly empty) subarray of nums.
Note that abs(x) is defined as follows:
If x is a negative integer, then abs(x) = -x.
If x is a non-negative integer, then abs(x) = x.
"""
# 1749. Maximum Absolute Sum of Any Subarray
class Solution():
    def maxAbsoluteSum(self, nums: list[int]) -> int:
        max_sum = 0
        min_sum = 0
        curr_max = 0
        curr_min = 0
        
        for num in nums:
            curr_max = max(num, curr_max + num)
            max_sum = max(max_sum, curr_max)
            
            curr_min = min(num, curr_min + num)
            min_sum = min(min_sum, curr_min)
            
        return max(max_sum, abs(min_sum))
    
# Test Code
solution = Solution()
#nums = [1,-3,2,3,-4] # Expect 5
#nums = [2,-5,1,-4,3,-2] # Expect 8
#nums = [-3,-2,-5,-1] # Expect 11
nums = [3,2,1,0,-1,-2,-3] # Expect 6

print(solution.maxAbsoluteSum(nums))