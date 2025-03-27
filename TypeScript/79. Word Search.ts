/*
Given an m x n grid of characters board and a string word, return true if word exists in the grid.
The word can be constructed from letters of sequentially adjacent cells, 
    where adjacent cells are horizontally or vertically neighboring. The same letter cell may not be used more than once.

79. Word Search
*/

function exist(board: string[][], word: string): boolean {
    const rows = board.length;
    const cols = board[0].length;
    
    function backtrack(i: number, j: number, index: number): boolean {
        if (index === word.length) { return true; }
        if (i < 0 || i >= rows || j < 0 || j >= cols) { return false; }
        if (board[i][j] !== word[index]) { return false; }
        
        const tempValueHolder = board[i][j];
        board[i][j] = "#";
        
        const found = backtrack(i + 1, j, index + 1) ||
            backtrack(i - 1, j, index + 1) ||
            backtrack(i, j + 1, index + 1) ||
            backtrack(i, j - 1, index + 1)
            
        board[i][j] = tempValueHolder;
        return found;
    }
    
    for (let i = 0; i < rows; i++) {
        for (let j = 0; j < cols; j++) {
            if (backtrack(i, j, 0)) { return true; }
        }
    }
    return false;    
};

console.log(exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCCED")); // Expect true
console.log(exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "SEE")); // Expect true
console.log(exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCB")); // Expect false