/**
 * 349. Intersection of Two Arrays
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @return {number[]}
 */
var intersection = function(nums1, nums2) {
    const out = new Set();
    let keys = new Set(nums1);

    for (let num of nums2) {
        if (keys.has(num)) { out.add(num); }
    }

    return [...out];
};

//console.log(intersection([1,2,2,1], [2,2])); // Expect [2]
console.log(intersection([4,9,5], [9,4,9,8,4])); // Expect [4,9]




