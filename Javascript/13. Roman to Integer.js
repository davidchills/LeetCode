/**
 * 13. Roman to Integer
 * @param {string} s
 * @return {number}
 */
var romanToInt = function(s) {
    const romanKeys = { "I": 1, "V": 5, "X": 10, "L": 50, "C": 100, "D": 500, "M": 1000 }
    const strLength = s.length
    let out = 0
    for (let i = (strLength - 1); i >= 0; i--) {
        let letter = s[i]
        out += romanKeys[letter]
        if (i > 0) {
            let prevLetter = s[i-1]
            if (prevLetter === 'I' && (letter === 'V' || letter === 'X')) {
                out -= 1;
                i--
            }
            if (prevLetter === 'X' && (letter === 'L' || letter === 'C')) {
                out -= 10;
                i--
            } 
            if (prevLetter === 'C' && (letter === 'D' || letter === 'M')) {
                out -= 100;
                i--
            }             
        }
    }
    return out
};

console.log(romanToInt("MCMXCIV"));