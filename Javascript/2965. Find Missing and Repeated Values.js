/*
You are given a 0-indexed 2D integer matrix grid of size n * n with values in the range [1, n2]. 
    Each integer appears exactly once except 'a' which appears twice and 'b' which is missing. 
    The task is to find the repeating and missing numbers a and b.
Return a 0-indexed integer array ans of size 2 where ans[0] equals to a and ans[1] equals to b.
*/
/**
 * 2965. Find Missing and Repeated Values
 * @param {number[][]} grid
 * @return {number[]}
 */
var findMissingAndRepeatedValues = function(grid) {
    const n = grid.length;
    const vector = new Array(n**2 + 1).fill(0);
    
    for (let number of grid) {
        for (let num of number) {
            vector[num]++;
        }
    }
    let [duplicate, missing] = [0, 0];
    for (let i = 1; i < vector.length; i++) {
        if (vector[i] > 1) {
            duplicate = i;
        }
        if (vector[i] === 0) {
            missing = i;
        }
        if (duplicate && missing) {
            return [duplicate, missing];
        }
    }
    return [duplicate, missing];
};

//console.log(findMissingAndRepeatedValues([[1,3],[2,2]])); // Expect [2,4]
console.log(findMissingAndRepeatedValues([[9,1,7],[8,9,2],[3,4,6]])); // Expect [9,5]
