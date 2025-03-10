/*
Given an m x n 2D binary grid grid which represents a map of '1's (land) and '0's (water), return the number of islands.
An island is surrounded by water and is formed by connecting adjacent lands horizontally or vertically. 
    You may assume all four edges of the grid are all surrounded by water.

200. Number of Islands
*/

function numIslands(grid: string[][]): number {
    const n1 = grid.length;
    const n2 = grid[0].length;
    let islands = 0;
    
    function bfs(row: number, col: number) {
        const queue = [[row, col]];
        grid[row][col] = '2'; // Mark as visited

        while (queue.length > 0) {
            const [r, c] = queue.shift();
            for (let [dr, dc] of [[0,1],[0,-1],[1,0],[-1,0]]) {
                const nr = r + dr; 
                const nc = c + dc;
                if (nr >= 0 && nc >= 0 && nr < n1 && nc < n2 && grid[nr][nc] === '1') {
                    grid[nr][nc] = '2';
                    queue.push([nr, nc]);
                }
            }
        }
    }

    for (let i = 0; i < n1; i++) {
        for (let j = 0; j < n2; j++) {
            if (grid[i][j] === '1') {
                islands++;
                bfs(i, j);
            }
        }
    }
    return islands;     
};

console.log(numIslands([
  ["1","1","1","1","0"],
  ["1","1","0","1","0"],
  ["1","1","0","0","0"],
  ["0","0","0","0","0"]
])); // Expect 1
console.log(numIslands([
  ["1","1","0","0","0"],
  ["1","1","0","0","0"],
  ["0","0","1","0","0"],
  ["0","0","0","1","1"]
])); // Expect 3 
console.log(numIslands([
    ["1","1","1"],
    ["0","1","0"],
    ["1","1","1"]
])); // Expect 1 
