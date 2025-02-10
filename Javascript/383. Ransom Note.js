/**
 * 383. Ransom Note
 * @param {string} ransomNote
 * @param {string} magazine
 * @return {boolean}
 */
var canConstruct = function(ransomNote, magazine) {
    const ra = ransomNote.split("")
    const ma = magazine.split("")
    let rv = true
    ra.forEach((letter) => {
        let index = ma.indexOf(letter)
        if (index > -1) { ma[index] = null }
        else { rv = false }
    })
    return rv
};

//console.log(canConstruct("a", "b")); // Expect false
//console.log(canConstruct("aa", "ab")); // Expect false
console.log(canConstruct("aa", "aab")); // Expect true




