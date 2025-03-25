"""
The n-queens puzzle is the problem of placing n queens on an n x n chessboard such that no two queens attack each other.
Given an integer n, return the number of distinct solutions to the n-queens puzzle.
"""
# 52. N-Queens II
from typing import List
class Solution:
    def totalNQueens(self, n: int) -> int:
        self.count = 0
        cols = [False] * n
        diag1 = [False] * (2 * n)
        diag2 = [False] * (2 * n)
        
        def backtrack(row: int):
            if row == n:
                self.count += 1
                return
            for col in range(n):
                d1 = row - col + n
                d2 = row + col
                if cols[col] or diag1[d1] or diag2[d2]:
                    continue
                cols[col] = diag1[d1] = diag2[d2] = True
                backtrack(row + 1)
                cols[col] = diag1[d1] = diag2[d2] = False
        
        backtrack(0)
        return self.count
    
# Test Code
solution = Solution()
print(solution.totalNQueens(4)) # Expect 2
print(solution.totalNQueens(1)) # Expect 1