/**
 * 36. Valid Sudoku
 * @param {character[][]} board
 * @return {boolean}
 */
var isValidSudoku = function(board) {
    const n = board.length
    const rowFound = Array.from({ length: n }, () => Array(n+1).fill(false))
    const colFound = Array.from({ length: n }, () => Array(n+1).fill(false))
    const subGrid = Array.from({ length: n }, () => Array(n+1).fill(false))
    for (let r = 0; r < n; r++) {
        for (let c = 0; c < n; c++) {
            let cell = board[r][c]
            if (cell === '.') { continue }
            const num = parseInt(cell, 10)
            if (isNaN(num) || num < 1 || num > 9) { return false }
            
            let subGridIndex = Math.floor(r/3) * 3 + Math.floor(c/3);
            
            if (rowFound[r][num] || colFound[c][num] || subGrid[subGridIndex][num]) { 
                return false 
            }
            
            rowFound[r][num] = true
            colFound[c][num] = true
            subGrid[subGridIndex][num] = true
        }
    }
    return true
    
};


var board = [["5","3",".",".","7",".",".",".","."]
,["6",".",".","1","9","5",".",".","."]
,[".","9","8",".",".",".",".","6","."]
,["8",".",".",".","6",".",".",".","3"]
,["4",".",".","8",".","3",".",".","1"]
,["7",".",".",".","2",".",".",".","6"]
,[".","6",".",".",".",".","2","8","."]
,[".",".",".","4","1","9",".",".","5"]
,[".",".",".",".","8",".",".","7","9"]]; // Expect true


/*
var board = [["8","3",".",".","7",".",".",".","."]
,["6",".",".","1","9","5",".",".","."]
,[".","9","8",".",".",".",".","6","."]
,["8",".",".",".","6",".",".",".","3"]
,["4",".",".","8",".","3",".",".","1"]
,["7",".",".",".","2",".",".",".","6"]
,[".","6",".",".",".",".","2","8","."]
,[".",".",".","4","1","9",".",".","5"]
,[".",".",".",".","8",".",".","7","9"]]; // Expect false
*/

/*
var board = [[".",".","4",".",".",".","6","3","."]
        ,[".",".",".",".",".",".",".",".","."]
        ,["5",".",".",".",".",".",".","9","."]
        ,[".",".",".","5","6",".",".",".","."]
        ,["4",".","3",".",".",".",".",".","1"]
        ,[".",".",".","7",".",".",".",".","."]
        ,[".",".",".","5",".",".",".",".","."]
        ,[".",".",".",".",".",".",".",".","."]
        ,[".",".",".",".",".",".",".",".","."]]; // Expect false
*/

console.log(isValidSudoku(board));



