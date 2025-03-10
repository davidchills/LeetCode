/*
Given a 0-indexed n x n integer matrix grid, return the number of pairs (ri, cj) such that row ri and column cj are equal.
A row and column pair is considered equal if they contain the same elements in the same order (i.e., an equal array).

2352. Equal Row and Column Pairs
*/

function equalPairs(grid: number[][]): number {
    const n = grid.length;
    const hash = new Map<string, number>();
    let pairs = 0;
    
    for (let i = 0; i < n; i++) {
        const row = grid[i].join(',');
        hash.set(row, (hash.get(row) || 0) + 1);
    }
    for (let j = 0; j < n; j++) {
        const column = [];
        for (let i = 0; i < n; i++) {
            column.push(grid[i][j]);
        }
        const colKey = column.join(',');
        if (hash.has(colKey)) {
            pairs += hash.get(colKey);
        }
    }
    return pairs;
};

console.log(equalPairs([[3,2,1],[1,7,6],[2,7,7]])); // Expect 1
console.log(equalPairs([[3,1,2,2],[1,4,4,5],[2,4,2,2],[2,4,2,2]])); // Expect 3