/*
Given two strings s and t, return true if s is a subsequence of t, or false otherwise.

A subsequence of a string is a new string that is formed from the original string by deleting some (can be none) 
    of the characters without disturbing the relative positions of the remaining characters. 
    (i.e., "ace" is a subsequence of "abcde" while "aec" is not).
*/
/**
 * 392. Is Subsequence
 * @param {string} s
 * @param {string} t
 * @return {boolean}
 */
var isSubsequence = function(s, t) {
    if (s === "") { return true; }
    const sLen = s.length;
    const tLen = t.length;
    let i = 0;
    let j = 0;
    
    while (i < sLen && j < tLen) {
        if (s[i] === t[j]) { i++; }
        j++;
    }
    return i === sLen;
};

//console.log(isSubsequence("abc", "ahbgdc")); // Expect true
console.log(isSubsequence("aaaaaa", "bbaaaa")); // Expect falsee