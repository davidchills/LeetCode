/*
You are given an array nums of n integers and two integers k and x.

The x-sum of an array is calculated by the following procedure:

Count the occurrences of all elements in the array.
Keep only the occurrences of the top x most frequent elements. If two elements have the same number of occurrences, the element with the bigger value is considered more frequent.
Calculate the sum of the resulting array.
Note that if an array has less than x distinct elements, its x-sum is the sum of the array.

Return an integer array answer of length n - k + 1 where answer[i] is the x-sum of the 
subarray
 nums[i..i + k - 1].
*/
/**
 * 3318. Find X-Sum of All K-Long Subarrays I
 * @param {number[]} nums
 * @param {number} k
 * @param {number} x
 * @return {number[]}
 */
var findXSum = function(nums, k, x) {
    const result = [];

    for (let i = 0; i <= nums.length - k; i++) {
        const subarray = nums.slice(i, i + k);
        const freqMap = new Map();

        // Count occurrences
        for (const num of subarray) {
            freqMap.set(num, (freqMap.get(num) || 0) + 1);
        }

        // Convert map to array and sort by frequency and value
        const sorted = Array.from(freqMap.entries()).sort((a, b) => {
            if (b[1] === a[1]) return b[0] - a[0]; // Sort by value if frequency is equal
            return b[1] - a[1]; // Sort by frequency
        });

        // Take top x most frequent elements
        const topX = sorted.slice(0, x);

        // Calculate sum
        const sum = topX.reduce((acc, [num, freq]) => acc + num * freq, 0);
        result.push(sum);
    }

    return result;    
};

//console.log(findXSum([1,1,2,2,3,4,2,3], 6, 2)); // Expect [6,10,12]
console.log(findXSum([3,8,7,8,7,5], 2, 2)); // Expect [11,15,15,15,12]



