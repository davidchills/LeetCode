/**
 * @param {string} s
 * @param {number[]} indices
 * @return {string}
 */
var restoreString = function(s, indices) {
    let ret = [];
    for (let i = 0; i < s.length; i++) {
        ret[indices[i]] = s[i];
    }
    return ret.join('');
};
console.log(restoreString("codeleet", [4,5,6,7,0,2,1,3]));