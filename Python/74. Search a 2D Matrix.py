"""
You are given an m x n integer matrix matrix with the following two properties:
• Each row is sorted in non-decreasing order.
• The first integer of each row is greater than the last integer of the previous row.
Given an integer target, return true if target is in matrix or false otherwise.
You must write a solution in O(log(m * n)) time complexity.
"""
# 74. Search a 2D Matrix
from typing import List
class Solution:
    def searchMatrix(self, matrix: List[List[int]], target: int) -> bool:
        if not matrix or not matrix[0]:
            return False
        rows = len(matrix)
        cols = len(matrix[0])
        if target < matrix[0][0] or target > matrix[rows - 1][cols - 1]:
            return False
               
        left = 0
        right = (rows * cols) - 1
        while left <= right:
            mid = left + (right - left) // 2
            row = mid // cols
            col = mid % cols
            value = matrix[row][col]
            if value == target:
                return True
            elif value < target:
                left = mid + 1
            else:
                right = mid - 1
                
        return False
        
        
    
# Test Code
solution = Solution()
print(solution.searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 3)) # Expect True
print(solution.searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 13)) # Expect False