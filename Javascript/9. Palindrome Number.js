/*
Given an integer x, return true if x is a 
palindrome
, and false otherwise.
*/
/**
 * 9. Palindrome Number
 * @param {number} x
 * @return {boolean}
 */
var isPalindrome = function(x) {
    if (x < 0) { return false; }
    if (x < 10) { return true; }
    return x.toString().split('').reverse().join('') === x.toString()
};

//console.log(isPalindrome(121)); // Expect true
//console.log(isPalindrome(-121)); // Expect false 
console.log(isPalindrome(10)); // Expect false


