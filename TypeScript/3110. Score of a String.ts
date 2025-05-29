/*
You are given a string s. 
The score of a string is defined as the sum of the absolute difference between the ASCII values of adjacent characters.
Return the score of s.

3110. Score of a String
*/

function scoreOfString(s: string): number {
    let result = 0;
    const n = s.length;
    for (let i = 1; i < n; i += 1) {
        result += Math.abs(s.charCodeAt(i) - s.charCodeAt(i - 1));
    }
    return result;
};

console.log(scoreOfString("hello")); // Expect 13
console.log(scoreOfString("zaz")); // Expect 50