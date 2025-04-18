"""
Given a triangle array, return the minimum path sum from top to bottom.
For each step, you may move to an adjacent number of the row below. 
More formally, if you are on index i on the current row, you may move to either index i or index i + 1 on the next row.
Follow up: Could you do this using only O(n) extra space, where n is the total number of rows in the triangle?
"""
# 120. Triangle
from typing import List
class Solution:
    def minimumTotal(self, triangle: List[List[int]]) -> int:
        n = len(triangle)
        dp = triangle[-1].copy()
        for i in range(n - 2, -1, -1):
            for j in range(i + 1):
                dp[j] = triangle[i][j] + min(dp[j], dp[j + 1])
                
        return dp[0]
        
    
# Test Code
solution = Solution()
print(solution.minimumTotal([[2],[3,4],[6,5,7],[4,1,8,3]])) # Expect 11
print(solution.minimumTotal([[-10]])) # Expect -10