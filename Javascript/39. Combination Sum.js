/*
Given an array of distinct integers candidates and a target integer target, 
    return a list of all unique combinations of candidates where the chosen numbers sum to target. 
    You may return the combinations in any order.
The same number may be chosen from candidates an unlimited number of times. 
    Two combinations are unique if the frequency of at least one of the chosen numbers is different.
The test cases are generated such that the number of unique combinations that sum up to target is less than 150 combinations 
    for the given input.
*/
/**
 * 39. Combination Sum
 * @param {number[]} candidates
 * @param {number} target
 * @return {number[][]}
 */
var combinationSum = function(candidates, target) {
    const result = [];
    const n = candidates.length;
    candidates.sort((a, b) => a - b);
    if (candidates[0] > target) { return result; }
    function backtrack(start, target, combinations) {
        if (target < 0) { return; }
        if (target === 0) {
            result.push([...combinations]);
            return;
        }
        
        for (let i = start; i < n; i++) {
            combinations.push(candidates[i]);
            backtrack(i, target - candidates[i], combinations)
            combinations.pop();
        }
    }
    backtrack(0, target, []);
    return result;
};

console.log(combinationSum([2,3,6,7], 7)); // Expect [[2,2,3],[7]]
console.log(combinationSum([2,3,5], 8)); // Expect [[2,2,2,2],[2,3,3],[3,5]]
console.log(combinationSum([2], 1)); // Expect []
