/**
 * @param {Array} arr
 * @param {number} size
 * @return {Array}
 */
var chunk = function(arr, size) {
    const n = arr.length;
    const out = [];
    let k = size;
    let sub = [];
    for (let i = 0; i < n; i++) {
        sub.push(arr[i]);
        k--;
        if (k <= 0 || i === n-1) {
            out.push(sub);
            sub = [];
            k = size;
        }
    }
    return out;
};


//console.log(chunk([1,2,3,4,5], 1)); // Expect [[1],[2],[3],[4],[5]]
//console.log(chunk([1,9,6,3,2],3)); // Expect [[1,9,6],[3,2]]
//console.log(chunk([8,5,3,2,6], 6)); // Expect [[8,5,3,2,6]]
console.log(chunk([], 1)); // Expect []


