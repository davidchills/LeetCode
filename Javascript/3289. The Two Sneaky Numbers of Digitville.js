/**
 * 3289. The Two Sneaky Numbers of Digitville
 * @param {number[]} nums
 * @return {number[]}
 */
var getSneakyNumbers = function(nums) {
    const numsLength = nums.length;
    const out = [];
    let found = 0;
    for (let i = 0; i < numsLength; i++) {
        for (let j = i+1; j < numsLength; j++) {
            if (nums[i] === nums[j]) {
                out.push(nums[i]);
                found++;
                if (found === 2) { return out; }
                break;
            }
        }
    }
    return out;
};
//console.log(getSneakyNumbers([0,1,1,0]));  // Expect [0,1]
//console.log(getSneakyNumbers([0,3,2,1,3,2])); // Expect [2,3]
console.log(getSneakyNumbers([7,1,5,4,3,4,6,0,9,5,8,2])); // Expect [4,5]
