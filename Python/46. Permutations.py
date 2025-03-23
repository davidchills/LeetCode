"""
Given an array nums of distinct integers, return all the possible permutations. You can return the answer in any order.
"""
# 46. Permutations
from typing import List
class Solution:
    def permute(self, nums: List[int]) -> List[List[int]]:
        self.n = len(nums)
        self.result = []
        self.used = [False] * self.n
        self.backtrack(nums, [])
        return self.result
    
    def backtrack(self, nums: List[int], sets: List[int]): 
        if len(sets) == self.n:
            self.result.append(sets[:])
            return
        
        for i in range(self.n):
            if not self.used[i]:
                self.used[i] = True
                sets.append(nums[i])
                self.backtrack(nums, sets)
                sets.pop()
                self.used[i] = False
        
    
# Test Code
solution = Solution()
print(solution.permute([1,2,3])) # Expect [[1,2,3],[1,3,2],[2,1,3],[2,3,1],[3,1,2],[3,2,1]]
print(solution.permute([0,1])) # Expect [[0,1],[1,0]]
print(solution.permute([1])) # Expect [[1]]