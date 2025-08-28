"""
You are given an n x n square matrix of integers grid. Return the matrix such that:
The diagonals in the bottom-left triangle (including the middle diagonal) are sorted in non-increasing order.
The diagonals in the top-right triangle are sorted in non-decreasing order.
"""
# 3446. Sort Matrix by Diagonals
import time
from typing import List
class Solution:
    def sortMatrix(self, grid: List[List[int]]) -> List[List[int]]:
        n = len(grid)
        m = len(grid[0])
        
        # Function to sort a diagonal starting from (r, c)
        def sort_diagonal(r, c, increasing):
            diagonal = []
            x, y = r, c
            while x < n and y < m:
                diagonal.append(grid[x][y])
                x += 1
                y += 1
            diagonal.sort(reverse=not increasing)
            x, y = r, c
            for val in diagonal:
                grid[x][y] = val
                x += 1
                y += 1
        
        # Sort bottom-left diagonals (including middle)
        for i in range(n):
            sort_diagonal(i, 0, increasing=False)
        
        # Sort top-right diagonals
        for j in range(1, m):
            sort_diagonal(0, j, increasing=True)
        
        return grid

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.sortMatrix([[1,7,3],[9,8,2],[4,5,6]])) # Expect [[8,2,3],[9,6,7],[4,5,1]]
print(solution.sortMatrix([[0,1],[1,2]])) # Expect [[2,1],[1,0]]
print(solution.sortMatrix([[1]])) # Expect [[1]]


end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")