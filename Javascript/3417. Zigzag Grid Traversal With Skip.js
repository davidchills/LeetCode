/**
 * 3417. Zigzag Grid Traversal With Skip
 * @param {number[][]} grid
 * @return {number[]}
 */
var zigzagTraversal = function(grid) {
    const left = 0;
    const right = grid[0].length - 1;
    let top = 0;
    const bottom = grid.length - 1;
    const out = [];
    let skip = false;
    while (top <= bottom) {
        
        for (let i = left; i <= right; i++) {
            if (skip === true) { skip = false; continue; }
            out.push(grid[top][i]);
            skip = true;
        }
        top++;
        
        if (top > bottom) { continue; }
        
        for (let i = right; i >= left; i--) {
            if (skip === true) { skip = false; continue; }
            out.push(grid[top][i]);
            skip = true;
        }
        top++;        
    }
    return out;
};

console.log(zigzagTraversal([[1,2],[3,4]])); // Expect [1,4]
//console.log(zigzagTraversal([[2,1],[2,1],[2,1]])); // Expect [2,1,2]
//console.log(zigzagTraversal([[1,2,3],[4,5,6],[7,8,9]])); // Expect [1,3,5,7,9]
//console.log(zigzagTraversal([[1,2,3,4,5],[6,7,8,9,10],[11,12,13,14,15]])); // Expect [1,3,5,9,7,11,13,15]
//console.log(zigzagTraversal([[1,2,3]])); // Expect [1,3]



