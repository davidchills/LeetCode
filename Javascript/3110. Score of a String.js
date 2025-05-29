/*
You are given a string s. 
The score of a string is defined as the sum of the absolute difference between the ASCII values of adjacent characters.
Return the score of s.
*/
/**
 * 3110. Score of a String
 * @param {string} s
 * @return {number}
 */
var scoreOfString = function(s) {
    var result = 0;
    let n = s.length;
    for (let i = 1; i < n; i += 1) {
        result += Math.abs(s.charCodeAt(i) - s.charCodeAt(i - 1));
    }
    return result;
};

console.log(scoreOfString("hello")); // Expect 13
console.log(scoreOfString("zaz")); // Expect 50
