/*
Description
*/
/**
 * 2529. Maximum Count of Positive Integer and Negative Integer
 * @param {number[]} nums
 * @return {number}
 */
var maximumCount = function(nums) {
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
