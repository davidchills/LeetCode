"""
Given an array of distinct integers candidates and a target integer target, 
    return a list of all unique combinations of candidates where the chosen numbers sum to target. 
    You may return the combinations in any order.
The same number may be chosen from candidates an unlimited number of times. 
    Two combinations are unique if the frequency of at least one of the chosen numbers is different.
The test cases are generated such that the number of unique combinations that sum up to target is less than 150 combinations 
    for the given input.
"""
# 39. Combination Sum
from typing import List
class Solution:
    def combinationSum(self, candidates: List[int], target: int) -> List[List[int]]:
        self.result = []
        candidates.sort()
        if candidates[0] > target:
            return self.result
        
        self.backtrack(0, target, candidates, [])
        return self.result
        
    def backtrack(self, start: int, target: int, candidates: List[int], combinations: List[int]):
        if target < 0:
            return
        if target == 0:
            self.result.append(combinations[:])
            return
        
        for i in range(start, len(candidates)):
            combinations.append(candidates[i])
            self.backtrack(i, target - candidates[i], candidates, combinations)
            combinations.pop()

    
# Test Code
solution = Solution()
print(solution.combinationSum([2,3,6,7], 7)) # Expect [[2,2,3],[7]]
print(solution.combinationSum([2,3,5], 8)) # Expect [[2,2,2,2],[2,3,3],[3,5]]
print(solution.combinationSum([2], 1)) # Expect []