/*
The Tribonacci sequence Tn is defined as follows: 
T0 = 0, T1 = 1, T2 = 1, and Tn+3 = Tn + Tn+1 + Tn+2 for n >= 0.
Given n, return the value of Tn.
*/
/**
 * 1137. N-th Tribonacci Number
 * @param {number} n
 * @return {number}
 */
var tribonacci = function(n) {
    if (n === 0) { return 0; }
    if (n < 3) { return 1; }
    let x = 0;
    let y = 1;
    let z = 1;
    
    for (let i = 3; i <= n; ++i) {
        [x, y, z] = [y, z, x + y + z];
    }
    return z;
};

//console.log(tribonacci(4)); // Expect 4
console.log(tribonacci(25)); // Expect 1389537
