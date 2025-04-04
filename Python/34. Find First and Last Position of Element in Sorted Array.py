"""
Given an array of integers nums sorted in non-decreasing order, find the starting and ending position of a given target value.
If target is not found in the array, return [-1, -1].
You must write an algorithm with O(log n) runtime complexity.
"""
# 34. Find First and Last Position of Element in Sorted Array
from typing import List
class Solution:
    def searchRange(self, nums: List[int], target: int) -> List[int]:
        n = len(nums)
        
        def findLeft():
            left = 0
            right = n - 1
            index = -1
            while left <= right:
                mid = left + (right - left) // 2
                if nums[mid] >= target:
                    if nums[mid] == target:
                        index = mid
                    right = mid - 1
                else:
                    left = mid + 1
            return index
        
        def findRight():
            left = 0
            right = n - 1
            index = -1
            while left <= right:
                mid = left + (right - left) // 2
                if nums[mid] <= target:
                    if nums[mid] == target:
                        index = mid
                    left = mid + 1
                else:
                    right = mid - 1
            return index
        leftIndex = findLeft()
        if leftIndex == -1:
            return [-1, -1]
        rightIndex = findRight()
        return [leftIndex, rightIndex]
        
    
# Test Code
solution = Solution()
print(solution.searchRange([5,7,7,8,8,10], 8)) # Expect [3,4]
print(solution.searchRange([5,7,7,8,8,10], 6)) # Expect [-1,-1]
print(solution.searchRange([], 0)) # Expect [-1,-1]