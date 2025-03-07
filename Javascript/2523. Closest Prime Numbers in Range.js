/*
Given two positive integers left and right, find the two integers num1 and num2 such that:
left <= num1 < num2 <= right .
Both num1 and num2 are prime numbers.
num2 - num1 is the minimum amongst all other pairs satisfying the above conditions.
Return the positive integer array ans = [num1, num2]. 
    If there are multiple pairs satisfying these conditions, return the one with the smallest num1 value. 
    If no such numbers exist, return [-1, -1].
*/
/**
 * 2523. Closest Prime Numbers in Range
 * @param {number} left
 * @param {number} right
 * @return {number[]}
 */
var closestPrimes = function(left, right) {
    function isPrime(num) {
        if (num < 2) { return false; }
        for (let i = 2; i * i <= num; i++) {
            if (num % i === 0) { return false; }
        }
        return true;
    }

    const primes = [];
    for (let i = left; i <= right; i++) {
        if (isPrime(i)) primes.push(i);
    }

    if (primes.length < 2) return [-1, -1];

    let minDiff = Infinity;
    let result = [-1, -1];
    
    for (let i = 1; i < primes.length; i++) {
        let diff = primes[i] - primes[i - 1];
        if (diff < minDiff) {
            minDiff = diff;
            result = [primes[i - 1], primes[i]];
        }
    }
    
    return result;    
};

//console.log(closestPrimes(10, 19)); // Expect [11,13]
console.log(closestPrimes(4, 6)); // Expect [-1,-1]
