/**
 * 3402. Minimum Operations to Make Columns Strictly Increasing
 * @param {number[][]} grid
 * @return {number}
 */
var minimumOperations = function(grid) {
    const rows = grid.length;
    const columns = grid[0].length;
    let operations = 0;
    for (let r = 0; r < rows -1; r++)  {
        for (let c = 0; c < columns; c++) {
            let diff = (grid[r][c] - grid[r+1][c]);
            if (diff > -1) {
                diff++;
                operations += diff;
                grid[r+1][c] += diff;
            }            
        }
    }
    return operations;
};

//console.log(minimumOperations([[3,2],[1,3],[3,4],[0,1]])); // Expect 15
console.log(minimumOperations([[3,2,1],[2,1,0],[1,2,3]])); // Expect 12




