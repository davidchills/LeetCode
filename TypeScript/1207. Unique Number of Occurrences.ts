/*
Given an array of integers arr, return true if the number of occurrences of each value in the array is unique or false otherwise.

1207. Unique Number of Occurrences
*/

function uniqueOccurrences(arr: number[]): boolean {
    const freq = new Map<number, number>();
    const unique = new Set<number>();
    for (let num of arr) {
        freq.set(num, (freq.get(num) || 0) + 1);
    }
    for (let count of freq.values()) {
        if (unique.has(count)) {
            return false; 
        }
        unique.add(count);
    }
    return true;
};

console.log(uniqueOccurrences([1,2,2,1,1,3])); // Expect true
//console.log(uniqueOccurrences([1,2])); // Expect false
//console.log(uniqueOccurrences([-3,0,1,-3,1,1,1,-3,10,0])); // Expect true
