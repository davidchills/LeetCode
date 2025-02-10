/**
 * 645. Set Mismatch
 * @param {number[]} nums
 * @return {number}
 */
var findErrorNums = function(nums) {
    const n= nums.length;
    const actualSum = nums.reduce((acc, curr) => acc+curr);
    const expectedSum = (n*(n+1)/2);
    const numCounts = new Array(nums.length+1).fill(0, 1);
    let duplicate = 0;
    nums.map((num) => { numCounts[num]++; });
    for (let i = 1; i < numCounts.length; i++) {
        if (numCounts[i] === 2) {
            duplicate = i;
            break;
        }
    }
    const missing = expectedSum - (actualSum - duplicate);
    
    return [duplicate, missing];
};
//console.log(findErrorNums([1,2,2,4])); // Expect [2,3]
//console.log(findErrorNums([1,1])); // Expect [1,2]
//console.log(findErrorNums([3,2,2])); // Expect [2,1]
//console.log(findErrorNums([1,3,3])); // Expect [3,2]
console.log(findErrorNums([3,2,3,4,6,5])); // Expect [3,1]