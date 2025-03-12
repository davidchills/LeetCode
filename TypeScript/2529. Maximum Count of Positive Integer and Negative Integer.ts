/*
Given an array nums sorted in non-decreasing order, 
    return the maximum between the number of positive integers and the number of negative integers.
In other words, if the number of positive integers in nums is pos and the number of negative integers is neg, then return the maximum of pos and neg.
Note that 0 is neither positive nor negative.

2529. Maximum Count of Positive Integer and Negative Integer
*/

function maximumCount(nums: number[]): number {
    const n = nums.length;
    let low = 0;
    let high = n - 1;
    
    while (low <= high) {
        let mid = Math.floor((low + high) / 2);
        if (nums[mid] < 0) { low = mid + 1; }
        else { high = mid - 1; }
    }
    const negs = low;
    
    low = 0;
    high = n - 1;
    
    while (low <= high) {
        let mid = Math.floor((low + high) / 2);
        if (nums[mid] <= 0) { low = mid + 1; }
        else { high = mid - 1; }
    }
    const pos = n - low;
    
    return Math.max(negs, pos);    
};

console.log(maximumCount([-2,-1,-1,1,2,3])); // Expect 3
console.log(maximumCount([-3,-2,-1,0,0,1,2])); // Expect 3
console.log(maximumCount([5,20,66,1314])); // Expect 4