/*
Given a positive integer n, return the punishment number of n.

The punishment number of n is defined as the sum of the squares of all integers i such that:

1 <= i <= n
The decimal representation of i * i can be partitioned into contiguous substrings such that 
the sum of the integer values of these substrings equals i.
*/
/**
 * 2698. Find the Punishment Number of an Integer
 * @param {number} n
 * @return {number}
 */
var punishmentNumber = function(n) {
    if (n < 1) { return 0; }
    let result = 1;
    for (let i = 2; i <= n; i++) {
        const mod = (i%9);
        if (mod === 0 || mod === 1) {
            const sq = (i*i).toString();
            result += (partition(sq, 0, [], i)) ? parseInt(sq) : 0;
        }
    }
    return result;
};

var partition = function(sq, start, parts, num) {
    const n = sq.length;
    if (start === n) {
        return (parts.reduce((acc, curr) => acc + curr) === num);
    }
    
    for (let i = start; i < n; i++) {
        const part = parseInt(sq.substring(start, i + 1), 10);
        parts.push(part);
        if (partition(sq, i + 1, parts, num)) {
            return true;
        }
        parts.pop();
    }
    return false;
}
// https://leetcode.com/problems/find-the-punishment-number-of-an-integer/submissions/1543437545
console.log(punishmentNumber(10)); // Expect 182
//console.log(punishmentNumber(37)); // Expect 1478



