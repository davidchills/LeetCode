/**
 * 11. Container With Most Water
 * @param {number[]} height
 * @return {number}
 */
var maxArea = function(height) {
    let left = 0;
    let right = height.length - 1
    let area = 0
    while(left < right) {
        let shortest = Math.min(height[left], height[right])
        let tmp = (shortest * (right - left))
        area = Math.max(area, tmp)
        if (height[left] > height[right]) { right-- }
        else { left++ }
    }
    return area
};
console.log(maxArea([1,8,6,2,5,4,8,3,7])); // Expect 49
//console.log(maxArea([1,1])); // Expect 1
//console.log(maxArea([1,2,4,3])); // Expect 4
