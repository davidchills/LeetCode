"""
Given an m x n integer matrix matrix, if an element is 0, set its entire row and column to 0's.
You must do it in place.
"""
# 73. Set Matrix Zeroes
from typing import List
class Solution:
    def setZeroes(self, matrix: List[List[int]]) -> None:
        """
        Do not return anything, modify matrix in-place instead.
        """
        numRows = len(matrix)
        numCols = len(matrix[0])
        zeroRows = set()
        zeroCols = set()
        
        for i in range(numRows):
            for j in range(numCols):
                if matrix[i][j] == 0:
                    zeroRows.add(i)
                    zeroCols.add(j)
                    
        for row in zeroRows:
             for i in range(numCols):
                matrix[row][i] = 0
                
        for col in zeroCols:
            for i in range(numRows):
                matrix[i][col] = 0
                    
    
# Test Code
solution = Solution()
matrix1 = [[1,1,1],[1,0,1],[1,1,1]]
matrix2 = [[0,1,2,0],[3,4,5,2],[1,3,1,5]]
solution.setZeroes(matrix1)
print(matrix1) # Expect [[1,0,1],[0,0,0],[1,0,1]]
solution.setZeroes(matrix2) 
print(matrix2) # Expect [[0,0,0,0],[0,4,5,0],[0,3,1,0]]