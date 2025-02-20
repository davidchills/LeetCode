/*
Implement pow(x, n), which calculates x raised to the power n (i.e., xn).
*/
/**
 * 50. Pow(x, n)
 * @param {number} x
 * @param {number} n
 * @return {number}
 */
var myPow = function(x, n) {
    if (n === 0) { return 1; }
    if (x === 0) { return 0; }
    
    const isNegative = n < 0;
    n = Math.abs(n);
    let result = 1;
    let base = x;
    
    while (n > 0) {
        if (n % 2 === 1) {
            result *= base;
        }
        base *= base;
        n = Math.floor(n/2);
        if (Math.abs(result) < Number.MIN_SAFE_INTEGER && isNegative) { 
            return 0;
        }
    }
    result = isNegative ? 1 / result : result;
    return Math.abs(result) < Number.MIN_VALUE ? 0 : result;
};


//console.log(myPow(2, 10)); // Expect 1024
console.log(myPow(2.1, 3)); // Expect 9.261
//console.log(myPow(2, -2)); // Expect 0.25
//console.log(myPow(-2, 3)); // Expect -8
//console.log(myPow(0.000001, -2147483647)); // 0
//console.log(myPow(-3.0, -5)); // -0.00412
