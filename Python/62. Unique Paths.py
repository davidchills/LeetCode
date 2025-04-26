"""
There is a robot on an m x n grid. The robot is initially located at the top-left corner (i.e., grid[0][0]). 
The robot tries to move to the bottom-right corner (i.e., grid[m - 1][n - 1]). 
The robot can only move either down or right at any point in time.
Given the two integers m and n, return the number of possible unique paths that the robot can take to reach the bottom-right corner.
The test cases are generated so that the answer will be less than or equal to 2 * 10^9.
"""
# 62. Unique Paths
from typing import List
#import math
class Solution:
    def uniquePaths(self, m: int, n: int) -> int:
        #return math.comb(m + n - 2, m - 1)
        dp = [1] * n
        for _ in range(1, m):
            for j in range(1, n):
                dp[j] += dp[j-1]
        
        return dp[-1]        
        
    
# Test Code
solution = Solution()
print(solution.uniquePaths(3, 7)) # Expect 28
print(solution.uniquePaths(3, 2)) # Expect 3
