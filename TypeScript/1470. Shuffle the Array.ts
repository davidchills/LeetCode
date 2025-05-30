/*
Given the array nums consisting of 2n elements in the form [x1,x2,...,xn,y1,y2,...,yn].
Return the array in the form [x1,y1,x2,y2,...,xn,yn].

1470. Shuffle the Array
*/

function shuffle(nums: number[], n: number): number[] {
    const result: number[] = [];
    for (let i = 0; i < n; i += 1) {
        result.push(nums[i], nums[i + n]);
    }
    return result;
};

console.log(shuffle([2,5,1,3,4,7], 3)); // Expect [2,3,5,4,1,7]
console.log(shuffle([1,2,3,4,4,3,2,1], 4)); // Expect [1,4,2,3,3,2,4,1]
console.log(shuffle([1,1,2,2], 2)); // Expect [1,2,1,2]