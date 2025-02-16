/*
For two strings s and t, we say "t divides s" if and only if s = t + t + t + ... + t + t (i.e., t is concatenated with itself one or more times).

Given two strings str1 and str2, return the largest string x such that x divides both str1 and str2.
*/
/**
 * 1071. Greatest Common Divisor of Strings
 * @param {string} str1
 * @param {string} str2
 * @return {string}
 */
var gcdOfStrings = function(str1, str2) {
    if (str1 + str2 !== str2 + str1) { return ""; }
    const gcdv = gcd(str1.length, str2.length);
    return str1.slice(0, gcdv);
};

const gcd = (a, b) => b === 0 ? a : gcd(b, a % b);


console.log(gcdOfStrings("ABCABC", "ABC")); // Expect "ABC"
//console.log(gcdOfStrings("ABABAB", "ABAB")); // Expect "AB"
//console.log(gcdOfStrings("LEET", "CODE")); // Expect ""

