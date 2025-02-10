/**
 * 49. Group Anagrams
 * @param {string[]} strs
 * @return {string[][]}
 */
var groupAnagrams = function(strs) {
    const myMap = new Map();
    strs.forEach((word) => {
        // Create a frequency count array for each word
        let count = new Array(26).fill(0);
        for (let char of word) {
            count[char.charCodeAt(0) - 'a'.charCodeAt(0)]++;
        }
        
        // Convert frequency array to a string key
        let key = count.join('#'); // Using '#' to separate counts avoids ambiguity

        // Add to hashmap
        if (!myMap.has(key)) {
            myMap.set(key, []);
        }
        myMap.get(key).push(word);
    });
    return [...myMap.values()];
};

console.log(groupAnagrams(["eat","tea","tan","ate","nat","bat"])); // Expect [["bat"],["nat","tan"],["ate","eat","tea"]]
//console.log(groupAnagrams([""])); // Expect [[""]]
//console.log(groupAnagrams(["a"])); // Expect [["a"]]



