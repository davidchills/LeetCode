"""
You are given an m x n matrix maze (0-indexed) with empty cells (represented as '.') and walls (represented as '+'). 
You are also given the entrance of the maze, where entrance = [entrancerow, entrancecol] denotes the row and column of the cell you are initially standing at.
In one step, you can move one cell up, down, left, or right. You cannot step into a cell with a wall, and you cannot step outside the maze. 
Your goal is to find the nearest exit from the entrance. 
An exit is defined as an empty cell that is at the border of the maze. The entrance does not count as an exit.
Return the number of steps in the shortest path from the entrance to the nearest exit, or -1 if no such path exists.
"""
# 1926. Nearest Exit from Entrance in Maze
from typing import List
from collections import deque
class Solution:
    def nearestExit(self, maze: List[List[str]], entrance: List[int]) -> int:
        numRows = len(maze)
        numCols = len(maze[0])
        directions = [(1, 0), (-1, 0), (0, 1), (0, -1)]
        # BFS queue holds tuples: (row, col, distance)
        queue = deque([(entrance[0], entrance[1], 0)])
        visited = set()
        visited.add((entrance[0], entrance[1]))
        
        while queue:
            i, j, dist = queue.popleft()
            if (i == 0 or i == numRows - 1 or j == 0 or j == numCols - 1) and (i, j) != (entrance[0], entrance[1]) and maze[i][j] == ".":
                return dist
            
            for di, dj in directions:
                ni = i + di
                nj = j + dj
                if 0 <= ni < numRows and 0 <= nj < numCols and (ni, nj) not in visited and maze[ni][nj] == ".":
                    visited.add((ni, nj))
                    queue.append((ni, nj, dist + 1))
    
        return - 1
    
# Test Code
solution = Solution()
print(solution.nearestExit([["+","+",".","+"],[".",".",".","+"],["+","+","+","."]], [1,2])) # Expect 1
print(solution.nearestExit([["+","+","+"],[".",".","."],["+","+","+"]], [1,0])) # Expect 2
print(solution.nearestExit([[".","+"]], [0,0])) # Expect -1