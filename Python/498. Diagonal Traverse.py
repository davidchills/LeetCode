"""
Given an m x n matrix mat, return an array of all the elements of the array in a diagonal order.
"""
# 498. Diagonal Traverse
from typing import List
class Solution:
    def findDiagonalOrder(self, mat: List[List[int]]) -> List[int]:
        if not mat or not mat[0]:
            return []
        
        m, n = len(mat), len(mat[0])
        result = []
        for d in range(m + n - 1):
            if d % 2 == 0:
                r = min(d, m - 1)
                c = d - r
                while r >= 0 and c < n:
                    result.append(mat[r][c])
                    r -= 1
                    c += 1
            else:
                c = min(d, n - 1)
                r = d - c
                while c >= 0 and r < m:
                    result.append(mat[r][c])
                    r += 1
                    c -= 1
        return result

    
# Test Code
solution = Solution()
print(solution.findDiagonalOrder([[1,2,3],[4,5,6],[7,8,9]])) # Expect [1,2,4,7,5,3,6,8,9]
print(solution.findDiagonalOrder([[1,2],[3,4]])) # Expect [1,2,3,4]
