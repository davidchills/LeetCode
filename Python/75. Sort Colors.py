"""
Given an array nums with n objects colored red, white, or blue, sort them in-place so that objects of the same color are adjacent, 
    with the colors in the order red, white, and blue.
We will use the integers 0, 1, and 2 to represent the color red, white, and blue, respectively.
You must solve this problem without using the library's sort function.
"""
# 75. Sort Colors
from typing import List
class Solution:
    def sortColors(self, nums: List[int]) -> None:
        """
        Do not return anything, modify nums in-place instead.
        """
        low = 0
        mid = 0
        high = len(nums) - 1
        
        while mid <= high:
            if nums[mid] == 0:
                nums[low], nums[mid] = nums[mid], nums[low]
                low += 1
                mid += 1
            elif nums[mid] == 1:
                mid += 1
            else:
                nums[mid], nums[high] = nums[high], nums[mid]
                high -= 1
                
        
    
# Test Code
solution = Solution()
nums1 = [2,0,2,1,1,0]
solution.sortColors(nums1)
print(nums1) # Expect [0,0,1,1,2,2]

nums2 = [2,0,1]
solution.sortColors(nums2)
print(nums2) # Expect [0,1,2]