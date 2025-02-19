/*
A happy string is a string that:

consists only of letters of the set ['a', 'b', 'c'].
s[i] != s[i + 1] for all values of i from 1 to s.length - 1 (string is 1-indexed).
For example, strings "abc", "ac", "b" and "abcbabcbcb" are all happy strings and strings "aa", "baa" and "ababbc" are not happy strings.

Given two integers n and k, consider a list of all happy strings of length n sorted in lexicographical order.

Return the kth string of this list or return an empty string if there are less than k happy strings of length n.
*/
/**
 * 1415. The k-th Lexicographical String of All Happy Strings of Length n
 * @param {number} n
 * @param {number} k
 * @return {string}
 */
var getHappyString = function(n, k) {
    const letters = ['a','b','c'];
    const path = [];
    const counter = { count: 0 };
    
    const backtrack = function() {
        if (path.length === n) {
            counter.count++;
            if (counter.count === k) {
                return path.join('');
            }
            return null;
        }
        
        for (let letter of letters) {
            if (path.length === 0 || path[path.length -1] !== letter) {
                path.push(letter);
                const result = backtrack();
                path.pop();
                if (result !== null) { return result; }
            }
        }
        return null;
    }
    return backtrack() ?? "";
};
//console.log(getHappyString(1, 3)); // Expect "c"
//console.log(getHappyString(1, 4)); // Expect ""
console.log(getHappyString(3, 9)); // Expect "cab"
