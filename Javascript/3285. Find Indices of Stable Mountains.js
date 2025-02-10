/**
 * 3285. Find Indices of Stable Mountains
 * @param {number[]} height
 * @param {number} threshold
 * @return {number[]}
 */
var stableMountains = function(height, threshold) {
    const out = [];
    for (let i = 1; i < height.length; i++) {
        if (height[i-1] > threshold) {
            out.push(i);
        }
    }
    return out;
};
console.log(stableMountains([1,2,3,4,5], 2)); // Expect [3,4]
//console.log(stableMountains([10,1,10,1,10], 2)); // Expect [1,3]
//console.log(stableMountains([10,1,10,1,10], 10)); // Expect []
