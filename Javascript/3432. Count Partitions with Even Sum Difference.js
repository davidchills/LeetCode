/**
 * 3432. Count Partitions with Even Sum Difference
 * @param {number[]} nums
 * @return {number}
 */
var countPartitions = function(nums) {
    const numsLength = nums.length;
    if (numsLength < 2) { return 0; }
    let partitions = 0;
    const totalSum = nums.reduce((accumulator, currentValue) => accumulator + currentValue);
    let prefixSum = 0;
    for (let i = 0; i < numsLength - 1; i++) {
        prefixSum += nums[i];
        const rightSum = totalSum - prefixSum;
        if ((prefixSum - rightSum) % 2 === 0) { partitions++; }
    }
    
    return partitions;
};

console.log(countPartitions([10,10,3,7,6])); // Expect 4
//console.log(countPartitions([1,2,2])); // Expect 0
//console.log(countPartitions([2,4,6,8])); // Expect 3




