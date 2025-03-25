/*
The n-queens puzzle is the problem of placing n queens on an n x n chessboard such that no two queens attack each other.
Given an integer n, return the number of distinct solutions to the n-queens puzzle.

52. N-Queens II
*/

function totalNQueens(n: number): number {
    let count = 0;
    function backtrack(row: number, cols: boolean[], diag1: boolean[], diag2: boolean[]) {
        if (row === n) {
            count += 1;
            return;
        }
        for (let col = 0; col < n; col++) {
            const d1: number = row - col + n;
            const d2: number = row + col;
            if (cols[col] || diag1[d1] || diag2[d2]) {
                continue;
            }
            cols[col] = true;
            diag1[d1] = true
            diag2[d2] = true
            backtrack(row + 1, cols, diag1, diag2);
            
            cols[col] = false;
            diag1[d1] = false;
            diag2[d2] = false;
        }
    }
    backtrack(0, new Array<boolean>(n).fill(false), new Array<boolean>(2 * n).fill(false), new Array<boolean>(2 * n).fill(false));
    return count;    
};

console.log(totalNQueens(4)); // Expect 2
console.log(totalNQueens(1)); // Expect 1