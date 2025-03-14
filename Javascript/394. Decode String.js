/*
Description
*/
/**
 * 394. Decode String
 * @param {string} s
 * @return {string}
 */
var decodeString = function(s) {
    const n = s.length;
    const stack = [];
    let num = 0;
    let builtString = "";
    
    for (let i = 0 ; i < n; i++) {
        const char = s[i];
        if (char >= '0' && char <= '9') {
            num = num * 10 + (char - '0');
        }
        else if (char === '[') {
            stack.push([builtString, num]);
            builtString = "";
            num = 0;
        }
        else if (char === ']') {
            const [prevStr, repeatTimes] = stack.pop();
            const expandedString = builtString.repeat(repeatTimes);
            if (expandedString.length > 1000000) {
                return "Output too large! Skipping expansion.";
            }
            builtString = prevStr + expandedString;
        }
        else { builtString += char; }
    }
    return builtString;
};

console.log(decodeString("3[a]2[bc]")); // Expect "aaabcbc"
console.log(decodeString("3[a2[c]]")); // Expect "accaccacc"
console.log(decodeString("2[abc]3[cd]ef")); // Expect "abcabccdcdcdef"
console.log(decodeString("99[99[99[99[99[99[a]]]]]]")); // Expect "Output too large! Skipping expansion."
