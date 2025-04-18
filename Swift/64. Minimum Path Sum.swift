/*
Given a m x n grid filled with non-negative numbers, find a path from top left to bottom right, 
which minimizes the sum of all numbers along its path.
Note: You can only move either down or right at any point in time.
    
64. Minimum Path Sum    
*/
class Solution {
    func minPathSum(_ grid: [[Int]]) -> Int {
        guard !grid.isEmpty, !grid[0].isEmpty else { return 0 }
        let rows = grid.count
        let cols = grid[0].count
        var dp = Array(repeating: 0, count: cols)
        dp[0] = grid[0][0]
        for col in 1..<cols {
            dp[col] = dp[col - 1] + grid[0][col]
        }
        for row in 1..<rows {
            dp[0] += grid[row][0]
            for col in 1..<cols {
                dp[col] = min(dp[col], dp[col - 1]) + grid[row][col]
            }
        }
        return dp.last!
    }
}
let solution = Solution()
print(solution.minPathSum([[1,3,1],[1,5,1],[4,2,1]])) // Expect 7
print(solution.minPathSum([[1,2,3],[4,5,6]]))  // Expect 12