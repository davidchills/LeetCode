/**
 * 242. Valid Anagram
 * @param {string} s
 * @param {string} t
 * @return {boolean}
 */
var isAnagram = function(s, t) {
    const sl = s.length
    const tl = t.length
    if (sl !== tl) { return false }
    const sm = new Map()
    const tm = new Map()
    for (let i = 0; i < sl; i++) {
        sm.set(s[i], (sm.get(s[i]) || 0) + 1)
        tm.set(t[i], (tm.get(t[i]) || 0) + 1)
    }
    for (const [key, value] of sm) {
        if (!tm.has(key) || tm.get(key) !== value) { return false }
    }
    return true
};

console.log(isAnagram("anagram", "nagaram")); // Expect true
//console.log(isAnagram("rat", "car")); // Expect false



