/*
You are given an m x n matrix board containing letters 'X' and 'O', capture regions that are surrounded:
Connect: A cell is connected to adjacent cells horizontally or vertically.
Region: To form a region connect every 'O' cell.
Surround: The region is surrounded with 'X' cells if you can connect the region with 'X' cells 
    and none of the region cells are on the edge of the board.
To capture a surrounded region, replace all 'O's with 'X's in-place within the original board. You do not need to return anything.

130. Surrounded Regions
*/
/**
 Do not return anything, modify board in-place instead.
 */
function solve(board: string[][]): void {
    const rows = board.length;
    const cols = board[0].length;
    if (rows === 0 || cols === 0) { return; }
    
    for (let i = 0; i < rows; i++) {
        dfs(board, i, 0);
        dfs(board, i, cols - 1);
    }
    for (let j = 0; j < cols; j++) {
        dfs(board, 0, j);
        dfs(board, rows - 1, j);
    }
    
    for (let i = 0; i < rows; i++) {
        for (let j = 0; j < cols; j++) {
            if (board[i][j] === 'O') {
                board[i][j] = 'X';
            }
            else if (board[i][j] === '#') {
                board[i][j] = 'O';
            }
        }
    }
    
    function dfs(board: string[][], i: number, j: number): void {
        const rows = board.length;
        const cols = board[0].length;
        
        if (i < 0 || i >= rows || j < 0 || j >= cols || board[i][j] != 'O') {
            return;
        }
        board[i][j] = '#';
        
        dfs(board, i + 1, j);
        dfs(board, i - 1, j);
        dfs(board, i, j + 1);
        dfs(board, i, j - 1);
    } 
    
    /*
    function bfs(board: string[][], i: number, j: number): void {
        const queue: [number, number][] = [[i, j]];
        while (queue.length) {
            const [r, c] = queue.shift()!;
            if (r < 0 || r >= board.length || c < 0 || c >= board[0].length || board[r][c] !== 'O') {
                continue;
            }
            board[r][c] = '#';
            queue.push([r+1, c], [r-1, c], [r, c+1], [r, c-1]);
        }
    }
    */
};

let board = [["X","X","X","X"],["X","O","O","X"],["X","X","O","X"],["X","O","X","X"]]; // Expect [["X","X","X","X"],["X","X","X","X"],["X","X","X","X"],["X","O","X","X"]]
//let board = [["X"]]; // Expect [["X"]]
solve(board);
console.log(board);