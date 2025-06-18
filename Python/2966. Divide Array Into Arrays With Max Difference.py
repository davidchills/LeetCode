"""
You are given an integer array nums of size n where n is a multiple of 3 and a positive integer k.
Divide the array nums into n / 3 arrays of size 3 satisfying the following condition:
The difference between any two elements in one array is less than or equal to k.
Return a 2D array containing the arrays. If it is impossible to satisfy the conditions, return an empty array. 
And if there are multiple answers, return any of them.
"""
# 2966. Divide Array Into Arrays With Max Difference
from typing import List
class Solution:
    def divideArray(self, nums: List[int], k: int) -> List[List[int]]:
        nums.sort()
        n = len(nums)
        result: List[List[int]] = []
        for i in range(0, n, 3):
            a, b, c = nums[i], nums[i + 1], nums[i + 2]
            if c - a > k:
                return []
            result.append([a, b, c])
        return result        
       

    
# Test Code
solution = Solution()
print(solution.divideArray([1,3,4,8,7,9,3,5,1], 2)) # Expect [[1,1,3],[3,4,5],[7,8,9]]
print(solution.divideArray([2,4,2,2,5,2], 2)) # Expect []
print(solution.divideArray([4,2,9,8,2,12,7,12,10,5,8,5,5,7,9,2,5,11], 14)) # Expect [[2,2,12],[4,8,5],[5,9,7],[7,8,5],[5,9,10],[11,12,2]]

