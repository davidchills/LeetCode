"""
Given an m x n binary matrix filled with 0's and 1's, find the largest square containing only 1's and return its area.
"""
# 221. Maximal Square
from typing import List
class Solution:
    def maximalSquare(self, matrix: List[List[str]]) -> int:
        if not matrix or not matrix[0]:
            return 0
        
        numRows = len(matrix)
        numCols = len(matrix[0])        
        dpTable = [[0] * (numCols + 1) for _ in range(numRows + 1)]
        maxSide = 0
        
        for row in range(1, numRows + 1):
            for col in range(1, numCols + 1):
                # Make sure you are looking for "1" not 1
                if matrix[row - 1][col - 1] == "1":
                    # can form a square extending from top, left, and top-left
                    top = dpTable[row - 1][col]
                    left = dpTable[row][col - 1]
                    topLeft = dpTable[row - 1][col - 1]
                    dpTable[row][col] = 1 + min(top, left, topLeft)
                    maxSide = max(maxSide, dpTable[row][col])
        
        return maxSide * maxSide        
        
    
# Test Code
solution = Solution()
print(solution.maximalSquare([["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]])) # Expect 4
print(solution.maximalSquare([["0","1"],["1","0"]])) # Expect 1
print(solution.maximalSquare([["0"]])) # Expect 0
