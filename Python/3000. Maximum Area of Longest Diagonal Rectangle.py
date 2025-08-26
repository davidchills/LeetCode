"""
You are given a 2D 0-indexed integer array dimensions.
For all indices i, 0 <= i < dimensions.length, dimensions[i][0] represents the length and dimensions[i][1] represents the width of the rectangle i.
Return the area of the rectangle having the longest diagonal. 
If there are multiple rectangles with the longest diagonal, return the area of the rectangle having the maximum area.
"""
# 3000. Maximum Area of Longest Diagonal Rectangle
from typing import List
class Solution:
    def areaOfMaxDiagonal(self, dimensions: List[List[int]]) -> int:
        max_diag = 0
        max_area = 0
        
        for length, width in dimensions:
            diag = length * length + width * width
            area = length * width
            
            if diag > max_diag:
                max_diag = diag
                max_area = area
            elif diag == max_diag:
                max_area = max(max_area, area)
        
        return max_area

    
# Test Code
solution = Solution()
print(solution.areaOfMaxDiagonal([[9,3],[8,6]])) # Expect 48
print(solution.areaOfMaxDiagonal([[3,4],[4,3]])) # Expect 12
