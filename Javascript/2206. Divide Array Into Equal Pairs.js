/*
You are given an integer array nums consisting of 2 * n integers.
You need to divide nums into n pairs such that:
Each element belongs to exactly one pair.
The elements present in a pair are equal.
Return true if nums can be divided into n pairs, otherwise return false.
*/
/**
 * 2206. Divide Array Into Equal Pairs
 * @param {number[]} nums
 * @return {boolean}
 */
var divideArray = function(nums) {
    const freqMap = new Map();
    for (const num of nums) {
        freqMap.set(num, (freqMap.get(num) ?? 0) + 1);
    }
    for (const count of freqMap.values()) {
        if (count % 2 !== 0) { return false; }
    }
    return true;
};

console.log(divideArray([3,2,3,2,2,2])); // Expect true
console.log(divideArray([1,2,3,4])); // Expect false
