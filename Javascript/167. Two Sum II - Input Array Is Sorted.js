/**
 * 167. Two Sum II - Input Array Is Sorted
 * @param {number[]} numbers
 * @param {number} target
 * @return {number[]}
 */
var twoSum = function(numbers, target) {
    const n = numbers.length
    let i = 0;
    let z = n - 1
    while (i < z) {
        let sum = (numbers[i] + numbers[z])
        if (sum === target) { return [i+1, z+1] }
        if (sum < target) { i++ }
        else { z-- }
    }
};
//console.log(twoSum([2,7,11,15], 9)); // Expect [1,2]
//console.log(twoSum([2,3,4], 6)); // Expect [1,3]
//console.log(twoSum([-1,0], -1)); // Expect [1,2]
const numbers = new Array(2999).fill(-1)
numbers[2998] = 1
numbers[2999] = 1
console.log(twoSum(numbers, 2)); // Expect [2999,3000]
