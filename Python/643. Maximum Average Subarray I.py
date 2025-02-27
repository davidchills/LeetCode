"""
You are given an integer array nums consisting of n elements, and an integer k.
Find a contiguous subarray whose length is equal to k that has the maximum average value and return this value. 
    Any answer with a calculation error less than 10-5 will be accepted.
"""
# 643. Maximum Average Subarray I
class Solution(object):
    def findMaxAverage(self, nums: list[int], k: int) -> float:
        n = len(nums)
        windowSum = sum(nums[:k])
        maxSum = windowSum
        
        for i in range(k, n):
            windowSum += nums[i] - nums[i - k]
            maxSum = max(maxSum, windowSum)
            
        return maxSum / k

    
# Test Code
solution = Solution()

#nums = [1,12,-5,-6,50,3]
#k = 4
# Expect 12.75

#nums = [5]
#k = 1
# Expect 5

nums = [7,4,5,8,8,3,9,8,7,6]
k = 7
# Expect 7

print(solution.findMaxAverage(nums, k))