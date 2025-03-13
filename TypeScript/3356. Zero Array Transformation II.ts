/*
You are given an integer array nums of length n and a 2D array queries where queries[i] = [li, ri, vali].
Each queries[i] represents the following action on nums:
Decrement the value at each index in the range [li, ri] in nums by at most vali.
The amount by which each value is decremented can be chosen independently for each index.
A Zero Array is an array with all its elements equal to 0.
Return the minimum possible non-negative value of k, such that after processing the first k queries in sequence, nums becomes a Zero Array. 
    If no such k exists, return -1.

3356. Zero Array Transformation II
*/

function minZeroArray(nums: number[], queries: number[][]): number {
    const n: number = nums.length;
    let left: number = 0;
    let right: number = queries.length;
    let result: number = -1;
    
    function canZeroArray(nums: number[], queries: number[][], k: number): boolean {
        const n: number = nums.length;
        const rangeUpdates: number[] = new Array(n + 1).fill(0);
        
        for (let i = 0; i < k; i++) {
            let [l, r, val] = queries[i];
            rangeUpdates[l] -= val;
            if (r + 1 < n) {
                rangeUpdates[r + 1] += val;
            }
        }
        
        let totalDecrement: number = 0;
        for (let i = 0; i < n; i++) {
            totalDecrement += rangeUpdates[i];
            if (nums[i] + totalDecrement > 0) {
                return false;
            }
        }
        return true;
    }
    
    while (left <= right) {
        const mid: number = Math.floor((left + right) / 2);
        
        if (canZeroArray(nums, queries, mid)) {
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