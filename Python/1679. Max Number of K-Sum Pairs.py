"""
You are given an integer array nums and an integer k.

In one operation, you can pick two numbers from the array whose sum equals k and remove them from the array.

Return the maximum number of operations you can perform on the array.
"""
# 1679. Max Number of K-Sum Pairs
class Solution:
    def maxOperations(self, nums: list[int], k: int) -> int:

        nums = sorted(nums)
        left = 0
        right = len(nums) - 1
        result = 0
        
        while (left < right):
            tsum = nums[left] + nums[right]
            if (tsum == k):
                result += 1
                left += 1
                right -= 1
        
            elif tsum < k:
                left += 1
            
            else:
                right -= 1
                
        return result
    
# Test Code

solution = Solution()

#nums = [1,2,3,4]
#k = 5
# Expect 2

nums = [3,1,3,4,3]
k = 6
# Expect 1


print(solution.maxOperations(nums, k))
