/*
You are given a 0-indexed string pattern of length n consisting of the characters 'I' meaning increasing and 'D' meaning decreasing.

A 0-indexed string num of length n + 1 is created using the following conditions:

num consists of the digits '1' to '9', where each digit is used at most once.
If pattern[i] == 'I', then num[i] < num[i + 1].
If pattern[i] == 'D', then num[i] > num[i + 1].
Return the lexicographically smallest possible string num that meets the conditions.
*/
/**
 * 2375. Construct Smallest Number From DI String
 * @param {string} pattern
 * @return {string}
 */
var smallestNumber = function(pattern) {
    const n = pattern.length;
    const stack = [];
    const result = [];
    
    for (let i = 0; i <= n; i++) {
        stack.push(i+1);
        if (i === n || pattern[i] === 'I') {
            while (stack.length !== 0) {
                result.push(stack.pop());
            }
        }
    }
    return result.join('');
};

//console.log(smallestNumber("IIIDIDDD")); // Expect "123549876"
console.log(smallestNumber("DDD")); // Expect "4321" 


