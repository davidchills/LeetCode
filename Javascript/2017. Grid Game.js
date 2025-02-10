/**
 * 2017. Grid Game
 * @param {number[][]} grid
 * @return {number}
 */
var gridGame = function(grid) {
    const n = grid[0].length
    let pointsForSecond = Number.MAX_SAFE_INTEGER
    let topSum = grid[0].reduce((total, currentValue) => total + currentValue)
    let bottomValue = 0
    for (let i = 0; i < n; i++) {
        topSum -= grid[0][i]
        pointsForSecond = Math.min(pointsForSecond, Math.max(topSum, bottomValue))
        bottomValue += grid[1][i]
    }
    return pointsForSecond
    
    /*
    const n = grid[0].length
    const prefixTop = new Array(n).fill(0)
    const prefixBottom = new Array(n).fill(0)
    
    prefixTop[0] = grid[0][0];
    prefixBottom[0] = grid[1][0];
    for (let i = 1; i < n; i++) {
        prefixTop[i] = prefixTop[i - 1] + grid[0][i]
        prefixBottom[i] = prefixBottom[i - 1] + grid[1][i]
    }   

    let minPointsForSecond = Number.MAX_SAFE_INTEGER
    
    for (let i = 0; i < n; i++) {
        let topPoints = prefixTop[n - 1] - prefixTop[i]
        let bottomPoints = (i > 0) ? prefixBottom[i - 1] : 0
        let secondRobotPoints = Math.max(topPoints, bottomPoints)

        // Minimize the points for the second robot
        minPointsForSecond = Math.min(minPointsForSecond, secondRobotPoints)
    }

    return minPointsForSecond;  
    */
};
//console.log(gridGame([[2,5,4],[1,5,1]])); // Expect 4
//console.log(gridGame([[3,3,1],[8,5,2]])); // Expect 4
console.log(gridGame([[1,3,1,15],[1,3,3,1]])); // Expect 7
