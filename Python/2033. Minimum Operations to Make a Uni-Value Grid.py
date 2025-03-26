"""
You are given a 2D integer grid of size m x n and an integer x. 
    In one operation, you can add x to or subtract x from any element in the grid.
A uni-value grid is a grid where all the elements of it are equal.
Return the minimum number of operations to make the grid uni-value. If it is not possible, return -1.
"""
# 2033. Minimum Operations to Make a Uni-Value Grid
from typing import List
class Solution:
    def minOperations(self, grid: List[List[int]], x: int) -> int:
        flat = [num for row in grid for num in row]
        remainder = flat[0] % x
        for num in flat:
            if num % x != remainder:
                return -1
            
        flat.sort()
        median = flat[len(flat) // 2]
        operations = sum(abs(num - median) // x for num in flat)
        return operations
    
# Test Code
solution = Solution()
print(solution.minOperations([[2,4],[6,8]], 2)) # Expect 4
print(solution.minOperations([[1,5],[2,3]], 1)) # Expect 5
print(solution.minOperations([[1,2],[3,4]], 2)) # Expect -1
