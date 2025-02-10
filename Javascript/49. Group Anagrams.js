/**
 * 49. Group Anagrams
 * @param {string[]} strs
 * @return {string[][]}
 */
var groupAnagrams = function(strs) {
    const myMap = new Map();
    strs.forEach((word) => {
        let key = word.split('').sort().join('');
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



