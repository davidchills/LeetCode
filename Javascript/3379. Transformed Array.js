/**
 * 3379. Transformed Array
 * @param {number[]} nums
 * @return {number[]}
 */
var constructTransformedArray = function(nums) {
    const n = nums.length;
    const result = new Array(n).fill(null);
    for (let i = 0; i < n; i++) {
        if (nums[i] === 0) { result[i] = nums[i]; }
        else {
            let steps = nums[i];
            let newIndex = (i + steps) % n;
            if (newIndex < 0) {
                newIndex += n;
            }  
            result[i] = nums[newIndex]; 
        }
    }
    return result;
};

//console.log(constructTransformedArray([3,-2,1,1])); // Expect [1,1,1,3]
console.log(constructTransformedArray([-1,4,-1])); // Expect [-1,-1,4]



