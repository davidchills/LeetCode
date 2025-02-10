/**
 * 54. Spiral Matrix
 * @param {number[][]} matrix
 * @return {number[]}
 */
var spiralOrder = function(matrix) {
    const out = [];
    let top = 0;
    let bottom = matrix.length - 1;
    let left = 0;
    let right = matrix[0].length - 1;
    while (top <= bottom && left <= right) {
        for (i = left; i <= right; i++) {
            out.push(matrix[top][i]);
        }
        top++;
    
        for (i = top; i <= bottom; i++) {
            out.push(matrix[i][right]);
        }
        right--;
        
        if (top <= bottom) {
            for (i = right; i >= left; i--) {
                out.push(matrix[bottom][i]);
            }
            bottom--;
        }    
        
        if (left <= right) {
            for (i = bottom; i >= top; i--) {
                out.push(matrix[i][left]);
            }
            left++;
        }    
    }
    return out;
};


console.log(spiralOrder([[1,2,3],[4,5,6],[7,8,9]])); // Expect [1,2,3,6,9,8,7,4,5]
//console.log(spiralOrder([[1,2,3,4],[5,6,7,8],[9,10,11,12]])); // Expect [1,2,3,4,8,12,11,10,9,5,6,7]



