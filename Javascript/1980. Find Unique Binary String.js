/*
Given an array of strings nums containing n unique binary strings each of length n, 
    return a binary string of length n that does not appear in nums. If there are multiple answers, you may return any of them.
*/
/**
 * 1980. Find Unique Binary String
 * @param {string[]} nums
 * @return {string}
 */
var findDifferentBinaryString = function(nums) {
    let result = "";
    for (let i = 0; i < nums.length; i++) {
        result += nums[i][i] === '0' ? '1' : '0';
    }
    return result;
};


//console.log(findDifferentBinaryString(["01","10"])); // Expect 11 or 00
//console.log(findDifferentBinaryString(["00","01"])); // Expect 11 or 10
console.log(findDifferentBinaryString(["111","011","001"])); // Expect 000, 010, 100, 101 or 110
