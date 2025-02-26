"""
Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.
"""
# 1. Two Sum
class Solution(object):
    def twoSum(self, nums: list[int], target: int) -> list[int]:
        hashmap = {}
        for i in range(len(nums)):
            complement = target - nums[i]
            
            if complement in hashmap:
                return [hashmap[complement], i]
            
            hashmap[nums[i]] = i
            
        return []
    
# Test Code
solution = Solution()

#nums = [2,7,11,15]
#target = 9
# Expect [0,1]

#nums = [3,2,4]
#target = 6
# Expect [1,2]

nums = [3,3]
target = 6
# Expect [0,1]


print(solution.twoSum(nums, target))