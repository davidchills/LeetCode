/**
 * @param {string} allowed
 * @param {string[]} words
 * @return {number}
 */
var countConsistentStrings = function(allowed, words) {
    let found = 0;
    const check = new RegExp("[^"+allowed+"]");
    words.forEach((word) => {
        if (!check.test(word)) { found++; }
    });
    return found;
};
//console.log(countConsistentStrings("ab", ["ad","bd","aaab","baa","badab"]));
//console.log(countConsistentStrings("abc", ["a","b","c","ab","ac","bc","abc"]));
console.log(countConsistentStrings("cad", ["cc","acd","b","ba","bac","bad","ac","d"]));