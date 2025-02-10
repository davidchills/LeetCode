/**
 * 3. Longest Substring Without Repeating Characters
 * @param {string} s
 * @return {number}
 */
var lengthOfLongestSubstring = function(s) {
    const strLen = s.length
    if (strLen < 2) { return strLen; }
    const seen = new Map()
    let longest = 0
    let left = 0
    for (let right = 0; right < strLen; right++) {
        let char = s[right]
        while (seen.has(char)) {
            seen.delete(s[left])
            left++
        }
        seen.set(char, true)
        longest = Math.max(longest, seen.size)
    }
    return longest
};
//console.log(lengthOfLongestSubstring("abcabcbb")); // Expect 3
//console.log(lengthOfLongestSubstring("bbbbb")); // Expect 1
//console.log(lengthOfLongestSubstring("pwwkew")); // Expect 3
//console.log(lengthOfLongestSubstring("")); // Expect 0
//console.log(lengthOfLongestSubstring("a")); // Expect 1
//console.log(lengthOfLongestSubstring("au")); // Expect 2
console.log(lengthOfLongestSubstring("dvdf")); // Expect 3