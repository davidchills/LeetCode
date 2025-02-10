/**
 * 1752. Check if Array Is Sorted and Rotated
 * @param {number[]} nums
 * @return {boolean}
 */
var check = function(nums) {
    /*
    const n = nums.length;
    let startIndex = 0;
    const longer = nums.concat(nums);
    for (let i = 1; i < n; i++) {
        if (nums[i] < nums[i-1]) {
            startIndex = i;
            break;
        }        
    }
    for (let x = startIndex+1; x < n+startIndex; x++) {
        if (longer[x-1] > longer[x]) { return false; }
    }
    return true; 
    */
    /* Alternate approach where we just check for more than 1 drop.
     *  This allows us to not use extra space of concating the array.
    */
    let countDrops = 0; // Count of "drops" (where order breaks)
    const n = nums.length;
    
    for (let i = 0; i < n; i++) {
        if (nums[i] > nums[(i + 1) % n]) { // Strictly greater, allowing duplicates
            countDrops++;
            if (countDrops > 1) return false; // More than one drop → not sorted & rotated
        }
    }

    return true;    
};

console.log(check([3,4,5,1,2])); // Expect true
//console.log(check([2,1,3,4])); // Expect false
//console.log(check([1,2,3])); // Expect true
//console.log(check([6,10,6])); // Expect true



