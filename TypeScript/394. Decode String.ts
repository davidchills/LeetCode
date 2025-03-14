/*
Given an encoded string, return its decoded string.
The encoding rule is: k[encoded_string], where the encoded_string inside the square brackets is being repeated exactly k times. 
    Note that k is guaranteed to be a positive integer.
You may assume that the input string is always valid; there are no extra white spaces, square brackets are well-formed, etc. 
    Furthermore, you may assume that the original data does not contain any digits and that digits are only for those repeat numbers, k. 
    For example, there will not be input like 3a or 2[4].
The test cases are generated so that the length of the output will never exceed 105.

394. Decode String
*/

function decodeString(s: string): string {
    const n: number = s.length;
    const stack: [string, number][] = [];
    let num: number = 0;
    let builtString: string = "";
    
    for (let i = 0 ; i < n; i++) {
        const char = s[i];
        if (char >= '0' && char <= '9') {
            num = num * 10 + Number(char);
        }
        else if (char === '[') {
            stack.push([builtString, num]);
            builtString = "";
            num = 0;
        }
        else if (char === ']') {
            const [prevStr, repeatTimes]: [string, number] = stack.pop()!;
            const expandedString: string = builtString.repeat(repeatTimes);
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