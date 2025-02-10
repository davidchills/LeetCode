/**
 * @param {string[]} words
 * @param {string} pref
 * @return {number}
 */
var prefixCount = function(words, pref) {
    let found = 0;
    words.forEach((word) => {
        if (word.slice(0, pref.length) === pref) { found++; }
    });
    return found;
};
//console.log(prefixCount(["pay","attention","practice","attend"], "at"));
console.log(prefixCount(["leetcode","win","loops","success"], "code"));