/*
There exists an infinitely large two-dimensional grid of uncolored unit cells. 
    You are given a positive integer n, indicating that you must do the following routine for n minutes:
At the first minute, color any arbitrary unit cell blue.
Every minute thereafter, color blue every uncolored cell that touches a blue cell.
    Return the number of colored cells at the end of n minutes.
*/
/**
 * 2579. Count Total Number of Colored Cells
 * @param {number} n
 * @return {number}
 */
var coloredCells = function(n) {
    if (n === 1) { return 1; }
    return n**2 + (n - 1)**2;
};

//console.log(coloredCells(1)); // Expect 1
//console.log(coloredCells(2)); // Expect 5
console.log(coloredCells(3)); // Expect 13
