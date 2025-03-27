/*
Given an m x n grid of characters board and a string word, return true if word exists in the grid.
The word can be constructed from letters of sequentially adjacent cells, 
    where adjacent cells are horizontally or vertically neighboring. The same letter cell may not be used more than once.
    
79. Word Search    
*/
class Solution {
    func exist(_ board: [[Character]], _ word: String) -> Bool {
        var board = board
        let rows = board.count
        let cols = board[0].count
        let letters = Array(word)
        
        for i in 0..<rows {
            for j in 0..<cols {
                if backtrack(i, j, 0) {
                    return true;
                }
            }     
        }
        func backtrack(_ i: Int, _ j: Int, _ index: Int) -> Bool {
            if index == word.count { return true }
            if i < 0 || i >= rows || j < 0 || j >= cols {
                return false 
            }
            if board[i][j] != letters[index] { return false }
            
            let tempValueHolder = board[i][j]
            board[i][j] = "#"
            
            let found: Bool = backtrack(i + 1, j, index + 1) ||
                backtrack(i - 1, j, index + 1) ||
                backtrack(i, j + 1, index + 1) ||
                backtrack(i, j - 1, index + 1)
                
            board[i][j] = tempValueHolder
            
            return found
        }
        return false
    }
}
let solution = Solution()
print(solution.exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCCED")); // Expect true
print(solution.exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "SEE")); // Expect true
print(solution.exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCB")); // Expect false