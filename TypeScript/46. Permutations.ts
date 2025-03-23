/*
Given an array nums of distinct integers, return all the possible permutations. You can return the answer in any order.

46. Permutations
*/

function permute(nums: number[]): number[][] {
    const n: number = nums.length;
    const result: number[][] = [];
    const used: boolean[] = new Array(n).fill(false);
    
    function backtrack (sets: number[]): void {
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