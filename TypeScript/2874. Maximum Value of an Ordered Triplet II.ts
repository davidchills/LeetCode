/*
You are given a 0-indexed integer array nums.
Return the maximum value over all triplets of indices (i, j, k) such that i < j < k. If all such triplets have a negative value, return 0.
The value of a triplet of indices (i, j, k) is equal to (nums[i] - nums[j]) * nums[k].

2874. Maximum Value of an Ordered Triplet II
*/

function maximumTripletValue(nums: number[]): number {
    const n = nums.length;
    if (n < 3) return 0;
    
    const prefixMax = new Array(n).fill(0);
    prefixMax[0] = nums[0];
    for (let i = 1; i < n; i++) {
        prefixMax[i] = Math.max(prefixMax[i - 1], nums[i]);
    }
    
    const suffixMax = new Array(n).fill(0);
    suffixMax[n - 1] = nums[n - 1];
    for (let i = n - 2; i >= 0; i--) {
        suffixMax[i] = Math.max(suffixMax[i + 1], nums[i]);
    }
    
    let maxValue = -Infinity;
    for (let j = 1; j < n - 1; j++) {
        let candidate = (prefixMax[j - 1] - nums[j]) * suffixMax[j + 1];
        maxValue = Math.max(maxValue, candidate);
    }
    
    return Math.max(maxValue, 0);       
};


console.log(maximumTripletValue([12,6,1,2,7])); // Expect 77
console.log(maximumTripletValue([1,10,3,4,19])); // Expect 133
console.log(maximumTripletValue([1,2,3])); // Expect 0