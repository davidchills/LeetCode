"""
Find all valid combinations of k numbers that sum up to n such that the following conditions are true:
Only numbers 1 through 9 are used.
Each number is used at most once.
Return a list of all possible valid combinations. 
The list must not contain the same combination twice, and the combinations may be returned in any order.
"""
# 216. Combination Sum III
from typing import List
class Solution:
    def combinationSum3(self, k: int, n: int) -> List[List[int]]:
        result = []
        
        def backtrack(start: int, remaining: int, combo: List[int]):
            if len(combo) == k:
                if remaining == 0:
                    result.append(combo.copy())
                return
            
            for num in range(start, 10):
                if num > remaining:
                    break
                combo.append(num)
                backtrack(num + 1, remaining - num, combo)
                combo.pop()
        
        backtrack(1, n, [])
        return result        
        
    
# Test Code
solution = Solution()
print(solution.combinationSum3(3, 7)) # Expect [[1,2,4]]
print(solution.combinationSum3(3, 9)) # Expect [[1,2,6],[1,3,5],[2,3,4]]
print(solution.combinationSum3(4, 1)) # Expect []