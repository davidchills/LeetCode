/**
 * 1267. Count Servers that Communicate
 * @param {number[][]} grid
 * @return {number}
 */
var countServers = function(grid) {
    const rowLength = grid.length
    const colLength = grid[0].length
    const rowCount = new Array(rowLength).fill(0)
    const colCount = new Array(colLength).fill(0)
    let servers = 0;
    
    for (let i = 0; i < rowLength; i++) {
        for (let j = 0; j < colLength; j++) {
            if (grid[i][j] === 1) {
                rowCount[i]++
                colCount[j]++
            }
        }
    }
    
    for (let i = 0; i < rowLength; i++) {
        for (let j = 0; j < colLength; j++) {
            if (grid[i][j] == 1 && (rowCount[i] > 1 || colCount[j] > 1)) {
                servers++
            }
        }
    }        
    return servers    
    
};
//console.log(countServers([[1,0],[0,1]])); // Expect 0
//console.log(countServers([[1,0],[1,1]])); // Expect 3
console.log(countServers([[1,1,0,0],[0,0,1,0],[0,0,1,0],[0,0,0,1]])); // Expect 4

