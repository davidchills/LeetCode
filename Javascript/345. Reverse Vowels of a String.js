/*
Given a string s, reverse only all the vowels in the string and return it.

The vowels are 'a', 'e', 'i', 'o', and 'u', and they can appear in both lower and upper cases, more than once.
*/
/**
 * 345. Reverse Vowels of a String
 * @param {string} s
 * @return {string}
 */
var reverseVowels = function(s) {
    const chars = s.split('');
    const vowels = new Set(['a','e','i','o','u','A','E','I','O','U']);
    let left = 0;
    let right = chars.length - 1;
    
    while (left < right) {
        while (left < right && !vowels.has(chars[left])) {
            left++;
        }
        while (left < right && !vowels.has(chars[right])) {
            right--;
        }        
        [chars[left], chars[right]] = [chars[right], chars[left]];
        left++;
        right--;
    }
    return chars.join('');
};

//console.log(reverseVowels("IceCreAm")); // Expect "AceCreIm"
console.log(reverseVowels("leetcode")); // Expect "leotcede"

