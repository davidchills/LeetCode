"""
Given an m x n 2D binary grid grid which represents a map of '1's (land) and '0's (water), return the number of islands.
An island is surrounded by water and is formed by connecting adjacent lands horizontally or vertically. 
    You may assume all four edges of the grid are all surrounded by water.
"""
# 200. Number of Islands
class Solution:
    def numIslands(self, grid: list[list[str]]) -> int:
        self.grid = grid
        islands = 0;
        self.n1 = len(grid)
        self.n2 = len(grid[0])
        
        for i in range(0, self.n1):
            for j in range(0, self.n2):
                if grid[i][j] == '1':
                    islands += 1
                    self.dfs(i, j)
                    
        return islands
    
    def dfs(self, row, col):
        directions = [[0,1],[0,-1],[1,0],[-1,0]]
        if row < 0 or col < 0 or row >= self.n1 or col >= self.n2 or self.grid[row][col] != '1':
            return
        self.grid[row][col] = '2'
        for dir in directions:
            self.dfs(row + dir[0], col + dir[1])
        
    
# Test Code
solution = Solution()
print(solution.numIslands([
  ["1","1","1","1","0"],
  ["1","1","0","1","0"],
  ["1","1","0","0","0"],
  ["0","0","0","0","0"]
])) # Expect 1
print(solution.numIslands([
  ["1","1","0","0","0"],
  ["1","1","0","0","0"],
  ["0","0","1","0","0"],
  ["0","0","0","1","1"]
])) # Expect 3
print(solution.numIslands([
    ["1","1","1"],
    ["0","1","0"],
    ["1","1","1"]
])) # Expect 1

