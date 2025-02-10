/**
 * 228. Summary Ranges
 * @param {number[]} nums
 * @return {string[]}
 */
var summaryRanges = function(nums) {
    const n = nums.length;
    if (n === 0) { return []; }
    const out = [];
    let start = nums[0];
    for (let i = 1; i < n; i++) {
        if (nums[i] !== nums[i-1]+1) {
            if (start === nums[i-1]) {
                out.push(start.toString());
            }
            else {
                out.push(start+'->'+nums[i-1]);
            }
            start = nums[i];
        }
    }
    
    if (start === nums[n-1]) {
        out.push(start.toString());
    } 
    else {
        out.push(start+'->'+nums[n-1]);
    }

    return out;    
};
console.log(summaryRanges([0,1,2,4,5,7])); // Expect ["0->2","4->5","7"]
//console.log(summaryRanges([0,2,3,4,6,8,9])); // Expect ["0","2->4","6","8->9"]