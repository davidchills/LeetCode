/*
The n-queens puzzle is the problem of placing n queens on an n x n chessboard such that no two queens attack each other.
Given an integer n, return the number of distinct solutions to the n-queens puzzle.
    
52. N-Queens II    
*/
class Solution {
    func totalNQueens(_ n: Int) -> Int {
        var count = 0
        var cols = Array(repeating: false, count: n)
        var diag1 = Array(repeating: false, count: 2 * n)
        var diag2 = Array(repeating: false, count: 2 * n)

        func backtrack(_ row: Int) {
            if row == n {
                count += 1
                return
            }
            for col in 0..<n {
                let d1 = row - col + n
                let d2 = row + col
                if cols[col] || diag1[d1] || diag2[d2] {
                    continue
                }
                cols[col] = true
                diag1[d1] = true
                diag2[d2] = true

                backtrack(row + 1)

                cols[col] = false
                diag1[d1] = false
                diag2[d2] = false
            }
        }

        backtrack(0)
        return count        
    }
}
let solution = Solution()
print(solution.totalNQueens(4)); // Expect 2
print(solution.totalNQueens(1)); // Expect 1