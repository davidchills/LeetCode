"""
You are given a 2D binary array grid. Find a rectangle with horizontal and vertical sides with the smallest area, 
    such that all the 1's in grid lie inside this rectangle.
Return the minimum possible area of the rectangle.
"""
# 3195. Find the Minimum Area to Cover All Ones I
from typing import List
class Solution:
    def minimumArea(self, grid: List[List[int]]) -> int:
        rows = len(grid) 
        cols = len(grid[0])
        min_row = rows 
        max_row = -1
        min_col = cols 
        max_col = -1
        
        for r in range(rows):
            for c in range(cols):
                if grid[r][c] == 1:
                    min_row = min(min_row, r)
                    max_row = max(max_row, r)
                    min_col = min(min_col, c)
                    max_col = max(max_col, c)
        
        if min_row > max_row or min_col > max_col:
            return 0
        
        return (max_row - min_row + 1) * (max_col - min_col + 1)

    
# Test Code
solution = Solution()
print(solution.minimumArea([[0,1,0],[1,0,1]])) # Expect 6
print(solution.minimumArea([[1,0],[0,0]])) # Expect 1
