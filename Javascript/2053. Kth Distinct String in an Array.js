/**
 * @param {string[]} arr
 * @param {number} k
 * @return {string}
 */
var kthDistinct = function(arr, k) {
    let found = 0;
    const length = arr.length;
    const kv = {};
    for (let i = 0; i < length; i++) {
        //console.log(arr[i]);
        //console.log(kv);
        if (!kv[arr[i]]) { kv[arr[i]] = 1; }
        else if (kv[arr[i]]) { kv[arr[i]] += 1; }
    }
    for (let j = 0; j < length; j++) {
        if (kv[arr[j]] === 1) { found++; }
        if (found === k) { return arr[j]; }
    }
    return "";
};
//console.log(kthDistinct(["d","b","c","b","c","a"], 2));
console.log(kthDistinct(["aaa","aa","a"], 1));
//console.log(kthDistinct(["a","b","a"], 3));