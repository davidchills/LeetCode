"""
You are given a 0-indexed integer array nums and two integers key and k. 
A k-distant index is an index i of nums for which there exists at least one index j such that |i - j| <= k and nums[j] == key.
Return a list of all k-distant indices sorted in increasing order.
"""
# 2200. Find All K-Distant Indices in an Array
from typing import List
class Solution:
    def findKDistantIndices(self, nums: List[int], key: int, k: int) -> List[int]:
        n = len(nums)
        ans = []
        diff = [0] * (n + 1)
        running = 0
        keyIndex = [i for i, v in enumerate(nums) if v == key]
        if not keyIndex:
            return []
        
        for j in keyIndex:
            left = max(0, j - k)
            right = min(n - 1, j + k)
            diff[left] += 1
            diff[right + 1] -= 1
        
        for i in range(n):
            running += diff[i]
            if running > 0:
                ans.append(i)
                
        return ans
        

    
# Test Code
solution = Solution()
print(solution.findKDistantIndices([3,4,9,1,3,9,5], 9, 1)) # Expect [1,2,3,4,5,6]
print(solution.findKDistantIndices([2,2,2,2,2], 2, 2)) # Expect [0,1,2,3,4]
