"""
You are given a 0-indexed integer array nums. An index i is part of a hill in nums if the closest non-equal neighbors of i are smaller than nums[i]. 
Similarly, an index i is part of a valley in nums if the closest non-equal neighbors of i are larger than nums[i]. 
Adjacent indices i and j are part of the same hill or valley if nums[i] == nums[j].
Note that for an index to be part of a hill or valley, it must have a non-equal neighbor on both the left and right of the index.
Return the number of hills and valleys in nums.
"""
# 2210. Count Hills and Valleys in an Array
from typing import List
class Solution:
    def countHillValley(self, nums: List[int]) -> int:
        compressed = []
        for x in nums:
            if not compressed or x != compressed[-1]:
                compressed.append(x)

        count = 0
        for i in range(1, len(compressed) - 1):
            if compressed[i] > compressed[i-1] and compressed[i] > compressed[i+1]:
                count += 1
            elif compressed[i] < compressed[i-1] and compressed[i] < compressed[i+1]:
                count += 1
        return count       

    
# Test Code
solution = Solution()
print(solution.countHillValley([2,4,1,1,6,5])) # Expect 3
print(solution.countHillValley([6,6,5,5,4,1])) # Expect 0

