/*
Two strings are considered close if you can attain one from the other using the following operations:
Operation 1: Swap any two existing characters.
For example, abcde -> aecdb
Operation 2: Transform every occurrence of one existing character into another existing character, and do the same with the other character.
For example, aacabb -> bbcbaa (all a's turn into b's, and all b's turn into a's)
You can use the operations on either string as many times as necessary.
Given two strings, word1 and word2, return true if word1 and word2 are close, and false otherwise.

1657. Determine if Two Strings Are Close
*/

function closeStrings(word1: string, word2: string): boolean {
    if (word1.length !== word2.length) { return false; }

    const getFrequencyMap = (word: string): Map<string, number> => {
        const map = new Map<string, number>();
        for (let char of word) {
            map.set(char, (map.get(char) || 0) + 1);
        }
        return map;
    };
    
    const freqMap1 = getFrequencyMap(word1);
    const freqMap2 = getFrequencyMap(word2);
    
    if ([...freqMap1.keys()].sort().join('') !== [...freqMap2.keys()].sort().join('')) {
        return false;
    }

    return [...freqMap1.values()].sort().join('') === [...freqMap2.values()].sort().join('');   
};

console.log(closeStrings("abc", "bca")); // Expect true
//console.log(closeStrings("a", "aa")); // Expect false
//console.log(closeStrings("cabbba", "abbccc")); // Expect true
//console.log(closeStrings("uau", "ssx")); // Expect false
