/*
Given an array nums of distinct integers, return all the possible permutations. You can return the answer in any order.
*/
/**
 * 46. Permutations
 * @param {number[]} nums
 * @return {number[][]}
 */
var permute = function(nums) {
    const n = nums.length;
    const result = [];
    const used = new Array(n).fill(false);
    
    function backtrack (sets) {
        if (sets.length === nums.length) {
            result.push([...sets]);
            return;
        }
        for (let i = 0; i < n; i++) {
            if (used[i] === true) { continue; }
            used[i] = true;
            sets.push(nums[i]);
            backtrack(sets);
            sets.pop();
            used[i] = false;
        }
    }
    backtrack([]);
    return result;
};

console.log(permute([1,2,3])); // Expect [[1,2,3],[1,3,2],[2,1,3],[2,3,1],[3,1,2],[3,2,1]]
console.log(permute([0,1])); // Expect [[0,1],[1,0]]
console.log(permute([1])); // Expect [[1]]
