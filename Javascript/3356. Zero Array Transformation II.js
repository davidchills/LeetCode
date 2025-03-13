/*
You are given an integer array nums of length n and a 2D array queries where queries[i] = [li, ri, vali].
Each queries[i] represents the following action on nums:
Decrement the value at each index in the range [li, ri] in nums by at most vali.
The amount by which each value is decremented can be chosen independently for each index.
A Zero Array is an array with all its elements equal to 0.
Return the minimum possible non-negative value of k, such that after processing the first k queries in sequence, nums becomes a Zero Array. 
    If no such k exists, return -1.
*/
/**
 * 3356. Zero Array Transformation II
 * @param {number[]} nums
 * @param {number[][]} queries
 * @return {number}
 */
var minZeroArray = function(nums, queries) {
    const n = nums.length;
    let left = 0;
    let right = queries.length;
    let result = -1;
    
    const canZeroArray = function(nums, queries, k) {
        const n = nums.length;
        const diff = new Array(n + 1).fill(0);
        
        for (let i = 0; i < k; i++) {
            let [l, r, val] = queries[i];
            diff[l] -= val;
            if (r + 1 < n) {
                diff[r + 1] += val;
            }
        }
        
        let currentDecrement = 0;
        for (let i = 0; i < n; i++) {
            currentDecrement += diff[i];
            if (nums[i] + currentDecrement > 0) {
                return false;
            }
        }
        return true;
    }
    
    while (left <= right) {
        const mid = Math.trunc((left + right) / 2);
        
        if (canZeroArray(nums.slice(), queries, mid)) {
            result = mid;
            right = mid - 1;
        }
        else { left = mid + 1; }
    }
    return result;
};

console.log(minZeroArray([2,0,2], [[0,2,1],[0,2,1],[1,1,3]])); // Expect 2
console.log(minZeroArray([4,3,2,1], [[1,3,2],[0,2,1]])); // Expect -1
console.log(minZeroArray([3,3,3], [[0,2,1],[0,2,1],[0,2,1]])); // Expect 3