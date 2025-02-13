/*
You are given a 0-indexed array nums consisting of positive integers. You can choose two indices i and j, such that i != j, and the sum of digits of the number nums[i] is equal to that of nums[j].

Return the maximum value of nums[i] + nums[j] that you can obtain over all possible indices i and j that satisfy the conditions.
*/
/**
 * 2342. Max Sum of a Pair With Equal Sum of Digits
 * @param {number[]} nums
 * @return {number}
 */
var maximumSum = function(nums) {
    let maxSum = -1;
    const sumMap = new Map();
    
    for (const num of nums) {
        let digitsSum = sumDigits(num);
        if (!sumMap.has(digitsSum)) {
            sumMap.set(digitsSum, [num, -1]);
        }
        else {
            let [max1, max2] = sumMap.get(digitsSum);
            if (num > max1) {
                max2 = max1;
                max1 = num;
            }
            else if (num > max2) {
                max2 = num;
            }
            sumMap.set(digitsSum, [max1, max2]);
            
        }
    }
    sumMap.forEach(([max1, max2], _) => {
        if (max2 !== -1) {
            maxSum = Math.max(maxSum, max1 + max2);
        }
    });
    return maxSum;
};

const sumDigits=(num)=>{
    let res = 0;
    while(num>0){
        res += num % 10;
        num = Math.floor(num / 10);
    }
    return res
}

//console.log(maximumSum([18,43,36,13,7])); // Expect 54
//console.log(maximumSum([10,12,19,14])); // Expect -1
//console.log(maximumSum([51, 42, 33, 60, 24])); // Expect 111
console.log(maximumSum([99, 11, 77, 22, 88])); // Expect -1 



