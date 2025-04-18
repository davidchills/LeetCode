/*
You are given an m x n integer array grid. There is a robot initially located at the top-left corner (i.e., grid[0][0]). 
The robot tries to move to the bottom-right corner (i.e., grid[m - 1][n - 1]). 
The robot can only move either down or right at any point in time.
An obstacle and space are marked as 1 or 0 respectively in grid. A path that the robot takes cannot include any square that is an obstacle.
Return the number of possible unique paths that the robot can take to reach the bottom-right corner.
The testcases are generated so that the answer will be less than or equal to 2 * 10^9.
    
63. Unique Paths II    
*/
class Solution {
    func uniquePathsWithObstacles(_ obstacleGrid: [[Int]]) -> Int {
        guard !obstacleGrid.isEmpty, !obstacleGrid[0].isEmpty else { return 0 }
        let rows = obstacleGrid.count
        let cols = obstacleGrid[0].count
        
        if obstacleGrid[0][0] == 1 || obstacleGrid[rows - 1][cols - 1] == 1 {
            return 0
        }
        
        var dp = Array(repeating: 0, count: cols)
        dp[0] = (obstacleGrid[0][0] == 0) ? 1 : 0
        
        for col in 1..<cols {
            dp[col] = (obstacleGrid[0][col] == 0) ? dp[col - 1] : 0
        }
        
        for row in 1..<rows {
            dp[0] = (obstacleGrid[row][0] == 0) ? dp[0] : 0
            for col in 1..<cols {
                if obstacleGrid[row][col] == 1 {
                    dp[col] = 0
                }
                else {
                    dp[col] = dp[col] + dp[col - 1]
                }
            }
        }
        return dp.last!
    }
}
let solution = Solution()
print(solution.uniquePathsWithObstacles([[0,0,0],[0,1,0],[0,0,0]])) // Expect 2
print(solution.uniquePathsWithObstacles([[0,1],[0,0]]))  // Expect 1