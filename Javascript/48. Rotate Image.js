/**
 * 48. Rotate Image
 * @param {number[][]} matrix
 * @return {void} Do not return anything, modify matrix in-place instead.
 */
var rotate = function(matrix) {
    const n = matrix.length;
    
    for (i = 0; i < n; i++) {
        for (j = i + 1; j < n; j++) {
            const temp = matrix[i][j];
            matrix[i][j] = matrix[j][i];
            matrix[j][i] = temp;
        }
    }    
    
    for (i = 0; i < n; i++) {
        matrix[i] = matrix[i].reverse();
    }    
};

//var matrix = [[1,2,3],[4,5,6],[7,8,9]]; // Expect [[7,4,1],[8,5,2],[9,6,3]]
var matrix = [[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]]; // Expect [[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]]
rotate(matrix);
console.log(matrix);



