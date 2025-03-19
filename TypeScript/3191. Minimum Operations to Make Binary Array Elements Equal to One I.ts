/*
You are given a binary array nums.
You can do the following operation on the array any number of times (possibly zero):
Choose any 3 consecutive elements from the array and flip all of them.
Flipping an element means changing its value from 0 to 1, and from 1 to 0.
Return the minimum number of operations required to make all elements in nums equal to 1. If it is impossible, return -1.

3191. Minimum Operations to Make Binary Array Elements Equal to One I
*/

function minOperations(nums: number[]): number {
    const n: number = nums.length;
    let flips: number = 0;
    
    for (let i: number = 0; i <= n - 3; i++) {
        if (nums[i] === 0) {
            for (let j: number = 0; j < 3; j++) {
                nums[i + j] ^= 1;
            }
            flips += 1;
        }
    }
    for (const num of nums) {
        if (num === 0) { return -1; }
    }
    return flips;    
};

console.log(minOperations([0,1,1,1,0,0])); // Expect 3
console.log(minOperations([0,1,1,1])); // Expect -1