/*
Given an m x n binary matrix filled with 0's and 1's, find the largest square containing only 1's and return its area.
    
221. Maximal Square    
*/
class Solution {
    func maximalSquare(_ matrix: [[Character]]) -> Int {
        // Guard against empty input
        guard !matrix.isEmpty, !matrix[0].isEmpty else {
            return 0
        }
        
        let numRows = matrix.count
        let numCols = matrix[0].count
        var dp = Array(
            repeating: Array(repeating: 0, count: numCols + 1),
            count: numRows + 1
        )
        var maxSide = 0
        
        // Populate DP table
        for row in 1...numRows {
            for col in 1...numCols {
                // Look for "1" not 1
                if matrix[row - 1][col - 1] == "1" {
                    let top     = dp[row - 1][col]
                    let left    = dp[row][col - 1]
                    let topLeft = dp[row - 1][col - 1]
                    dp[row][col] = 1 + min(top, min(left, topLeft))
                    
                    if dp[row][col] > maxSide {
                        maxSide = dp[row][col]
                    }
                }
            }
        }
        
        return maxSide * maxSide        
    }
}
let solution = Solution()
print(solution.maximalSquare([["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]])) // Expect 4
print(solution.maximalSquare([["0","1"],["1","0"]]))  // Expect 1
print(solution.maximalSquare([["0"]]))  // Expect 0