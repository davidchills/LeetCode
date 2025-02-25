/*
Given an array of integers arr, return the number of subarrays with an odd sum.

Since the answer can be very large, return it modulo 10^9 + 7.
*/
/**
 * 1524. Number of Sub-arrays With Odd Sum
 * @param {number[]} arr
 * @return {number}
 */
var numOfSubarrays = function(arr) {
    const mod = Math.pow(10,9)+7;
    let oddCount = 0;
    let evenCount = 1;
    let prefixSum = 0;
    let result = 0;
    
    for (let num of arr) {
        prefixSum += num;
        if (prefixSum % 2 === 1) {
            result = (result + evenCount) % mod;
            oddCount++;
        }
        else {
            result = (result + oddCount) % mod;
            evenCount++;
        }
    }
    return result;
};

console.log(numOfSubarrays([1,3,5])); // Expect 4
//console.log(numOfSubarrays([2,4,6])); // Expect 0
//console.log(numOfSubarrays([1,2,3,4,5,6,7])); // Expect 16
