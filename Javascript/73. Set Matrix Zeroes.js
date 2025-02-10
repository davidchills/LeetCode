/**
 * 73. Set Matrix Zeroes
 * @param {number[][]} matrix
 * @return {void} Do not return anything, modify matrix in-place instead.
 */
var setZeroes = function(matrix) {
    /*
    // This is the faster but more space solution.
    // Time Complexity: O(m × n)
	// Space Complexity: O(m + n)
    const numberOfRows = matrix.length;
    const numberOfColumns = matrix[0].length;
    const changeRows = new Set();
    const changeColumns = new Set();
    
    for (let i = 0; i < numberOfRows; i++) {
        for (let j = 0; j < numberOfColumns; j++) {
            if (matrix[i][j] === 0) {
                changeRows.add(i);
                changeColumns.add(j);
            }
        }
    }
    
    changeRows.forEach((index) => {
        for (let i = 0; i < numberOfColumns; i++) {
            matrix[index][i] = 0;
        }
    });
    
    changeColumns.forEach((index) => {
        for (let i = 0; i < numberOfRows; i++) {
            matrix[i][index] = 0;
        }
    });
    */
    // This is the slower but no additional space solution.
    //	Time Complexity: O(m × n)
	//	Space Complexity: O(1)
    const numberOfRows = matrix.length;
    const numberOfColumns = matrix[0].length;
    const firstRowZero = matrix[0].includes(0);
    const firstColumnZero = matrix.some(row => row[0] === 0);
    
    for (let i = 1; i < numberOfRows; i++) {
        for (let j = 1; j < numberOfColumns; j++) {
            if (matrix[i][j] === 0) {
                matrix[i][0] = 0;
                matrix[0][j] = 0;
            }
        }
    } 
    
    for (let i = 1; i < numberOfRows; i++) {
        for (j = 1; j < numberOfColumns; j++) {
            if (matrix[i][0] === 0 || matrix[0][j] === 0) {
                matrix[i][j] = 0;
            }
        }
    }   
    
    if (firstRowZero) { matrix[0].fill(0); }
    
    if (firstColumnZero) {
        for (let i = 0; i < numberOfRows; i++) {
            matrix[i][0] = 0;
        }
    }    
    
};
var matrix = [[1,1,1],[1,0,1],[1,1,1]]; // Expect [[1,0,1],[0,0,0],[1,0,1]]
//var matrix = [[0,1,2,0],[3,4,5,2],[1,3,1,5]]; // Expect [[0,0,0,0],[0,4,5,0],[0,3,1,0]]
setZeroes(matrix);
console.log(matrix);
