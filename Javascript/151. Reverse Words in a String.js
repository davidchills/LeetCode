/**
 * 151. Reverse Words in a String
 * @param {string} s
 * @return {string}
 */
var reverseWords = function(s) {
    return s.replaceAll(/\s+/g, " ").trim().split(' ').reverse().join(' ')
};

console.log(reverseWords(" a    0 good   example "))