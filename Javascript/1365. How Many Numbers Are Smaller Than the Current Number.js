/**
 * @param {number[]} nums
 * @return {number[]}
 */
var smallerNumbersThanCurrent = function(nums) {
    const length = nums.length;
    const out = [];
    for (let i = 0; i < length; i++) {
        let count = 0;
        for (let j = 0; j < length; j++) {
            if (j !== i && nums[j] < nums[i]) { count++; }
        }
        out.push(count);
    }
    return out;
};
console.log(smallerNumbersThanCurrent([8,1,2,2,3]));
//console.log(smallerNumbersThanCurrent([6,5,4,8]));
//console.log(smallerNumbersThanCurrent([7,7,7,7]));