/*
Given a string s consisting only of characters a, b and c.
Return the number of substrings containing at least one occurrence of all these characters a, b and c.

1358. Number of Substrings Containing All Three Characters
*/

function numberOfSubstrings(s: string): number {
    const n = s.length;
    const ltrs = new Map();
    let subs = 0;
    let left = 0;
    
    for (let right = 0; right < n; right++) {
        ltrs.set(s[right], (ltrs.get(s[right]) || 0) + 1);
        while (ltrs.size === 3) {
            subs += n - right;
            ltrs.set(s[left], ltrs.get(s[left]) - 1);
            if (ltrs.get(s[left]) === 0) { ltrs.delete(s[left]); }
            left++;
        }
    }
    return subs;    
};

console.log(numberOfSubstrings("abcabc")); // Expect 10
console.log(numberOfSubstrings("aaacb")); // Expect 3
console.log(numberOfSubstrings("abc")); // Expect 1