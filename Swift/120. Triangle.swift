/*
Given a triangle array, return the minimum path sum from top to bottom.
For each step, you may move to an adjacent number of the row below. 
More formally, if you are on index i on the current row, you may move to either index i or index i + 1 on the next row.
Follow up: Could you do this using only O(n) extra space, where n is the total number of rows in the triangle?

120. Triangle    
*/
class Solution {
    func minimumTotal(_ triangle: [[Int]]) -> Int {
        let n = triangle.count
        var dp = triangle[n - 1]
        for i in stride(from: n - 2, through: 0, by: -1) {
            for j in 0...i {
                dp[j] = triangle[i][j] + min(dp[j], dp[j + 1])
            }
        }
        return dp[0]
    }
}
let solution = Solution()
print(solution.minimumTotal([[2],[3,4],[6,5,7],[4,1,8,3]])) // Expect 11
print(solution.minimumTotal([[-10]]))  // Expect -10