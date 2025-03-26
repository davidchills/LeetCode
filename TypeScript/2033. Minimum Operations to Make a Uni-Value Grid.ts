/*
You are given a 2D integer grid of size m x n and an integer x. 
    In one operation, you can add x to or subtract x from any element in the grid.
A uni-value grid is a grid where all the elements of it are equal.
Return the minimum number of operations to make the grid uni-value. If it is not possible, return -1.

2033. Minimum Operations to Make a Uni-Value Grid
*/

function minOperations(grid: number[][], x: number): number {
    const flattened: number[] = grid.flat();
    const remainder: number = flattened[0] % x;
    for (let number of flattened) {
        if (number % x !== remainder) {
            return -1;
        }
    }
    flattened.sort((a, b) => a - b);
    const median: number = flattened[Math.floor(flattened.length / 2)]
    let operations = 0;
    for (let number of flattened) {
        operations += Math.abs(number - median) / x;
    }
    return operations;    
};

console.log(minOperations([[2,4],[6,8]], 2)); // Expect 4
console.log(minOperations([[1,5],[2,3]], 1)); // Expect 5
console.log(minOperations([[1,2],[3,4]], 2)); // Expect -1
