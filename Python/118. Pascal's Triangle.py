"""
Given an integer numRows, return the first numRows of Pascal's triangle.
In Pascal's triangle, each number is the sum of the two numbers directly above it as shown:
"""
# 118. Pascal's Triangle
from typing import List
class Solution:
    def generate(self, numRows: int) -> List[List[int]]:
        if numRows <= 0:
            return []
        result = [[1]]
        for r in range(1, numRows):
            prev = result[-1]
            row = [1]
            for i in range(1, len(prev)):
                row.append(prev[i-1] + prev[i])
            row.append(1)
            result.append(row)
        return result       

    
# Test Code
solution = Solution()
print(solution.generate(5)) # Expect [[1],[1,1],[1,2,1],[1,3,3,1],[1,4,6,4,1]]
print(solution.generate(1)) # Expect [[1]]
