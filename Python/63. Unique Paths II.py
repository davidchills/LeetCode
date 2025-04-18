"""
You are given an m x n integer array grid. There is a robot initially located at the top-left corner (i.e., grid[0][0]). 
The robot tries to move to the bottom-right corner (i.e., grid[m - 1][n - 1]). 
The robot can only move either down or right at any point in time.
An obstacle and space are marked as 1 or 0 respectively in grid. A path that the robot takes cannot include any square that is an obstacle.
Return the number of possible unique paths that the robot can take to reach the bottom-right corner.
The testcases are generated so that the answer will be less than or equal to 2 * 10^9.
"""
# 63. Unique Paths II
from typing import List
class Solution:
    def uniquePathsWithObstacles(self, obstacleGrid: List[List[int]]) -> int:
        rows = len(obstacleGrid) 
        cols = len(obstacleGrid[0])
        dp = [0] * cols
        
        dp[0] = 1 if obstacleGrid[0][0] == 0 else 0
        
        for col in range(1, cols):
            dp[col] = dp[col - 1] if obstacleGrid[0][col] == 0 else 0
        
        for row in range(1, rows):
            dp[0] = dp[0] if obstacleGrid[row][0] == 0 else 0
            for col in range(1, cols):
                if obstacleGrid[row][col] == 1:
                    dp[col] = 0
                else:
                    dp[col] = dp[col] + dp[col - 1]
        
        return dp[-1]        
        
    
# Test Code
solution = Solution()
print(solution.uniquePathsWithObstacles([[0,0,0],[0,1,0],[0,0,0]])) # Expect 2
print(solution.uniquePathsWithObstacles([[0,1],[0,0]])) # Expect 1