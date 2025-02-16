/*
Given an integer n, find a sequence that satisfies all of the following:

The integer 1 occurs once in the sequence.
Each integer between 2 and n occurs twice in the sequence.
For every integer i between 2 and n, the distance between the two occurrences of i is exactly i.
The distance between two numbers on the sequence, a[i] and a[j], is the absolute difference of their indices, |j - i|.

Return the lexicographically largest sequence. It is guaranteed that under the given constraints, there is always a solution.

A sequence a is lexicographically larger than a sequence b (of the same length) if in the first position where a and b differ, 
sequence a has a number greater than the corresponding number in b. For example, [0,1,9,0] is lexicographically 
larger than [0,1,5,6] because the first position they differ is at the third number, and 9 is greater than 5.
*/
/**
 * 1718. Construct the Lexicographically Largest Valid Sequence
 * @param {number} n
 * @return {number[]}
 */
var constructDistancedSequence = function(n) {
    const len = 2 * n - 1;
    const sequence = Array(len).fill(0);
    const used = Array(n + 1).fill(false, 1);
    backtrack(sequence, used, 0, n);
    return sequence;
};

var backtrack = function(sequence, used, index, n) {
    if (index === sequence.length) { return true; }
    if (sequence[index] !== 0) {
        return backtrack(sequence, used, index + 1, n);
    }
    for (let i = n; i >= 1; i--) {
        if (!used[i]) {
            if (i === 1) {
                sequence[index] = 1;
                used[1] = true;
                if (backtrack(sequence, used, index + 1, n)) { return true; }
                sequence[index] = 0;
                used[1] = false;
            }
            else {
                let nextPos = index + i;
                if (nextPos < sequence.length && sequence[nextPos] === 0) {
                    sequence[index] = i;
                    sequence[nextPos] = i;
                    used[i] = true;
                    if (backtrack(sequence, used, index + 1, n)) { return true; }
                    sequence[index] = 0;
                    sequence[nextPos] = 0;
                    used[i] = false;
                }
            }
        }
    }
    return false;
};


//console.log(constructDistancedSequence(3)); // Expect [3,1,2,3,2]
console.log(constructDistancedSequence(5)); // Expect [5,3,1,4,3,5,2,4,2]

