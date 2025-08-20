"""
Given a m * n matrix of ones and zeros, return how many square submatrices have all ones.
"""
# 1277. Count Square Submatrices with All Ones
from typing import List
class Solution:
    def countSquares(self, matrix: List[List[int]]) -> int:
        if not matrix or not matrix[0]:
            return 0
        
        rows, cols = len(matrix), len(matrix[0])
        dp = [[0] * cols for _ in range(rows)]
        count = 0
        
        for i in range(rows):
            for j in range(cols):
                if matrix[i][j] == 1:
                    if i == 0 or j == 0:
                        dp[i][j] = 1
                    else:
                        dp[i][j] = min(dp[i-1][j], dp[i][j-1], dp[i-1][j-1]) + 1
                    count += dp[i][j]
        
        return count

    
# Test Code
solution = Solution()
print(solution.countSquares([
  [0,1,1,1],
  [1,1,1,1],
  [0,1,1,1]
])) # Expect 15
print(solution.countSquares([
  [1,0,1],
  [1,1,0],
  [1,1,0]
])) # Expect 7

