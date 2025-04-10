"""
You are given an m x n grid where each cell can have one of three values:
0 representing an empty cell,
1 representing a fresh orange, or
2 representing a rotten orange.
Every minute, any fresh orange that is 4-directionally adjacent to a rotten orange becomes rotten.
Return the minimum number of minutes that must elapse until no cell has a fresh orange. If this is impossible, return -1.
"""
# 994. Rotting Oranges
from typing import List
from collections import deque
class Solution:
    def orangesRotting(self, grid: List[List[int]]) -> int:
        rows = len(grid)
        if rows == 0:
            return -1
        cols = len(grid[0])
        queue = deque()
        fresh = 0
        minutes = 0
        directions = [(1, 0), (-1, 0), (0, 1), (0, -1)]
        
        for i in range(rows):
            for j in range(cols):
                if grid[i][j] == 2:
                    queue.append((i, j))
                elif grid[i][j] == 1:
                    fresh += 1
        
        # If there are no fresh oranges, return 0 minutes.
        if fresh == 0:
            return 0
        
        while queue:
            minutes += 1
            for _ in range(len(queue)):
                i, j = queue.popleft()
                for di, dj in directions:
                    ni, nj = i + di, j + dj
                    # Check if neighbor is within bounds and is a fresh orange.
                    if 0 <= ni < rows and 0 <= nj < cols and grid[ni][nj] == 1:
                        grid[ni][nj] = 2     # Mark as rotten.
                        fresh -= 1
                        queue.append((ni, nj))
                        
            if fresh == 0:
                return minutes
        
        return -1        
    
# Test Code
solution = Solution()
print(solution.orangesRotting([[2,1,1],[1,1,0],[0,1,1]])) # Expect 4
print(solution.orangesRotting([[2,1,1],[0,1,1],[1,0,1]])) # Expect -1
print(solution.orangesRotting([[0,2]])) # Expect 0