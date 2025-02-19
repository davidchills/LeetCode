/*
Given a non-negative integer x, return the square root of x rounded down to the nearest integer. The returned integer should be non-negative as well.

You must not use any built-in exponent function or operator.

For example, do not use pow(x, 0.5) in c++ or x ** 0.5 in python.
*/
/**
 * 69. Sqrt(x)
 * @param {number} x
 * @return {number}
 */
var mySqrt = function(x) {
    if (x < 0) { return null; }
    if (x < 2) { return x; }
    let guess = x;
    while (Math.abs(guess * guess - x) > 0.5) {
        guess = (guess + x / guess) / 2;
    }
    return parseInt(guess, 10);
};


//console.log(mySqrt(2)); // Expect 1
//console.log(mySqrt(4)); // Expect 2
//console.log(mySqrt(8)); // Expect 2
//console.log(mySqrt(10)); // Expect 3
console.log(mySqrt(25)); // Expect 5
