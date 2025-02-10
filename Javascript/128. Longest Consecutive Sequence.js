/**
 * 128. Longest Consecutive Sequence
 * @param {number[]} nums
 * @return {number}
 */
var longestConsecutive = function(nums) {
    if (nums.length === 0) { return 0; }
    let maxLength = 0;
    const keySet = new Set(nums);
    //keySet.forEach((num) => {
    for (const num of keySet) {
        if (!keySet.has(num-1)) {
            let currLength = 1;
            while (keySet.has(num+currLength)) {
                currLength++;
            }
            maxLength = Math.max(maxLength, currLength);
        }
    };
    return maxLength;
};

//console.log(longestConsecutive([100,4,200,1,3,2])); // Expect 4
console.log(longestConsecutive([0,3,7,2,5,8,4,6,0,1])); // Expect 9



