/*
Given a string s and an integer k, return the maximum number of vowel letters in any substring of s with length k.
Vowel letters in English are 'a', 'e', 'i', 'o', and 'u'.
*/
/**
 * 1456. Maximum Number of Vowels in a Substring of Given Length
 * @param {string} s
 * @param {number} k
 * @return {number}
 */
var maxVowels = function(s, k) {
    const n = s.length;
    if (n < k) { return 0; }
    const vowels = new Set(['a','e','i','o','u']);
    let maxVC = 0;
    let currVC = 0;
    
    for (let i = 0; i < k; i++) {
        if (vowels.has(s[i])) {
            currVC++;
        }
    }
    maxVC = currVC;
    
    for (let i = k; i < n; i++) {
        if (vowels.has(s[i - k])) {
            currVC--;
        }
        if (vowels.has(s[i])) {
            currVC++
        }
        maxVC = Math.max(maxVC, currVC);
    }
    
    return maxVC;
};

//console.log(maxVowels("abciiidef", 3)); // Expect 3
//console.log(maxVowels("aeiou", 2)); // Expect 2
console.log(maxVowels("leetcode", 3)); // Expect 2
