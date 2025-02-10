/**
 * 125. Valid Palindrome
 * @param {string} s
 * @return {boolean}
 */
var isPalindrome = function(s) {
    s = s.toLowerCase().replaceAll(/[^a-z0-9]/g,"")
    let rs = ''
    for (let i = s.length - 1; i >= 0; i--) { rs += s[i] }
    return rs === s
};
console.log(isPalindrome(" "));