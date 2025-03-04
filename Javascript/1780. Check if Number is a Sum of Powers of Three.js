/*
Given an integer n, return true if it is possible to represent n as the sum of distinct powers of three. Otherwise, return false.
An integer y is a power of three if there exists an integer x such that y == 3x.
*/
/**
 * 1780. Check if Number is a Sum of Powers of Three
 * @param {number} n
 * @return {boolean}
 */
var checkPowersOfThree = function(n) {
    while (n > 0) {
        if (n % 3 > 1) { return false; }
        n = (n / 3) | 0;
    }
    return true;
};

//console.log(checkPowersOfThree(12)); // Expect true
//console.log(checkPowersOfThree(91)); // Expect true
console.log(checkPowersOfThree(21)); // Expect false
