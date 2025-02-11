/*
Given two strings s and part, perform the following operation on s until all occurrences of the substring part are removed:

Find the leftmost occurrence of the substring part and remove it from s.
Return s after removing all occurrences of part.

A substring is a contiguous sequence of characters in a string.
*/
/**
 * 1910. Remove All Occurrences of a Substring
 * @param {string} s
 * @param {string} part
 * @return {string}
 */
var removeOccurrences = function(s, part) {
    while (s.includes(part)) {
        s = s.replace(part, "");
    }
    return s;
};

//console.log(removeOccurrences("daabcbaabcbc", "abc")); // Expect "dab"
//console.log(removeOccurrences("axxxxyyyyb", "xy")); // Expect "ab"
console.log(removeOccurrences("aabababa", "aba")); // Expect "ba"



