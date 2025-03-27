"""
An element x of an integer array arr of length m is dominant if more than half the elements of arr have a value of x.
You are given a 0-indexed integer array nums of length n with one dominant element.
You can split nums at an index i into two arrays nums[0, ..., i] and nums[i + 1, ..., n - 1], but the split is only valid if:
0 <= i < n - 1
nums[0, ..., i], and nums[i + 1, ..., n - 1] have the same dominant element.
Here, nums[i, ..., j] denotes the subarray of nums starting at index i and ending at index j, 
    both ends being inclusive. Particularly, if j < i then nums[i, ..., j] denotes an empty subarray.
Return the minimum index of a valid split. If no valid split exists, return -1.
"""
# 2780. Minimum Index of a Valid Split
from typing import List
class Solution:
    def minimumIndex(self, nums: List[int]) -> int:
        n = len(nums)
        candidate = None
        count = 0
        total = 0
        leftCount = 0
        
        for num in nums:
            if count == 0:
                candidate = num
                count = 1
            elif num == candidate:
                count += 1
            else:
                count -= 1
                
        for num in nums:
            if num == candidate:
                total += 1
                
        for i in range(0, n - 1):
            if nums[i] == candidate:
                leftCount += 1
                
            leftSize = i + 1
            rightSize = n - leftSize
            rightCount = total - leftCount
            if leftCount * 2 > leftSize and rightCount * 2 > rightSize:
                return i
            
        return -1
            
    
# Test Code
solution = Solution()
print(solution.minimumIndex([1,2,2,2])) # Expect 2
print(solution.minimumIndex([2,1,3,1,1,1,7,1,2,1])) # Expect 4
print(solution.minimumIndex([3,3,3,3,7,2,2])) # Expect -1
