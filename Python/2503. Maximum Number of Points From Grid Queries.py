"""
You are given an m x n integer matrix grid and an array queries of size k.
Find an array answer of size k such that for each integer queries[i] you start in the top left cell of the matrix 
    and repeat the following process:
If queries[i] is strictly greater than the value of the current cell that you are in, 
    then you get one point if it is your first time visiting this cell, 
    and you can move to any adjacent cell in all 4 directions: up, down, left, and right.
Otherwise, you do not get any points, and you end this process.
After the process, answer[i] is the maximum number of points you can get. 
    Note that for each query you are allowed to visit the same cell multiple times.
Return the resulting array answer.
"""
# 2503. Maximum Number of Points From Grid Queries
from typing import List
import heapq, bisect
class Solution:
    def maxPoints(self, grid: List[List[int]], queries: List[int]) -> List[int]:
        rows = len(grid)
        cols = len(grid[0])
        heap = [(grid[0][0], 0, 0)]
        visited = {(0, 0)}
        order = []
        maxSoFar = -1
        while len(heap) > 0:
            curr, i, j = heapq.heappop(heap)
            order.append(curr)
            for x, y in [(i - 1, j), (i, j - 1), (i + 1, j), (i, j + 1)]:
                if 0 <= x < rows and 0 <= y < cols and (x, y) not in visited:
                    visited.add((x, y))
                    heapq.heappush(heap, (grid[x][y], x, y))
        
        for i in range(len(order)):
            maxSoFar = max(maxSoFar, order[i])
            order[i] = maxSoFar
        res = []
        for q in queries:
            res.append(bisect.bisect_left(order, q))
        return res  
        
# Test Code
solution = Solution()
print(solution.maxPoints([[1,2,3],[2,5,7],[3,5,1]], [5,6,2])) # Expect [5,8,1]
print(solution.maxPoints([[5,2,1],[1,1,2]], [3])) # Expect [0]