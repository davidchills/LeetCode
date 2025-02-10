/**
 * 219. Contains Duplicate II
 * @param {number[]} nums
 * @param {number} k
 * @return {boolean}
 */
var containsNearbyDuplicate = function(nums, k) {
    if (k < 1) { return false; }
    const map = new Map();
    for (let i = 0; i < nums.length; i++) {
        if (map.has(nums[i]) && (i - map.get(nums[i]) <= k)) {
            return true;
        }
        map.set(nums[i], i);
    }
    return false;
};

console.log(containsNearbyDuplicate([1,2,3,1], 3)); // Expect true
//console.log(containsNearbyDuplicate([1,0,1,1], 1)); // Expect true
//console.log(containsNearbyDuplicate([1,2,3,1,2,3], 2)); // Expect false



