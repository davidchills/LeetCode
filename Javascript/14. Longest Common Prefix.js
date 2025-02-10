/**
 * 14. Longest Common Prefix
 * @param {string[]} strs
 * @return {string}
 */
var longestCommonPrefix = function(strs) {
    let prefix = ''
    strs.sort()
    const first = strs[0]
    const last = strs[strs.length-1]
    const wordLength = first.length
    for (let i = 0; i < wordLength; i++) {
        if (first.substring(i, i+1) === last.substring(i, i+1)) {
            prefix += first.substring(i, i+1)
        }
        else { return prefix }
    }
    return prefix
};

console.log(longestCommonPrefix(["flower","flower","flower","flower"]))