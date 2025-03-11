/*
You are given a string word and a non-negative integer k.
Return the total number of substrings of word that contain every vowel ('a', 'e', 'i', 'o', and 'u') at least once and exactly k consonants.
*/
/**
 * 3306. Count of Substrings Containing Every Vowel and K Consonants II
 * @param {string} word
 * @param {number} k
 * @return {number}
 */
var countOfSubstrings = function(word, k) {
    
    function atLeastK(word, k) {
        const vowels = new Set(['a','e','i','o','u']);
        const n = word.length;
        const vowelCount = new Array(5).fill(0);
        let start = 0;
        let end = 0;
        let numValidSubstrings = 0;
        let consonantCount = 0;
        let vowelTypes = 0;
        
        while (end < n) {
            const newLetter = word[end];
            if (vowels.has(newLetter)) {
                let index = "aeiou".indexOf(newLetter);
                if (vowelCount[index] === 0) { vowelTypes++; }
                vowelCount[index]++;
            }
            else { consonantCount++; }
            
            while (vowelTypes === 5 && consonantCount >= k) {
                numValidSubstrings += n - end;
                const startLetter = word[start];
                if (vowels.has(startLetter)) {
                    let index = "aeiou".indexOf(startLetter);
                    vowelCount[index]--;
                    if (vowelCount[index] === 0) { vowelTypes--; }
                }
                else { consonantCount--; }
                start++;
            }
            end++;
        }
        return numValidSubstrings;        
    }
    
    return atLeastK(word, k) - atLeastK(word, k + 1);
};

console.log(countOfSubstrings("aeioqq", 1)); // Expect 0
console.log(countOfSubstrings("aeiou", 0)); // Expect 1
console.log(countOfSubstrings("ieaouqqieaouqq", 1)); // Expect 3
console.log(countOfSubstrings("iqeaouqi", 2)); // Expect 3
