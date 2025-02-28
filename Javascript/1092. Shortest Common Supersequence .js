/*
Given two strings str1 and str2, return the shortest string that has both str1 and str2 as subsequences. 
    If there are multiple valid strings, return any of them.
A string s is a subsequence of string t if deleting some number of characters from t (possibly 0) results in the string s.
*/
/**
 * 1092. Shortest Common Supersequence 
 * @param {string} str1
 * @param {string} str2
 * @return {string}
 */
var shortestCommonSupersequence = function(str1, str2) {
    const m = str1.length;
    const n = str2.length;
    const dp = Array.from({ length: m + 1 }, () => Array(n + 1).fill(0));
    
    for (let i = 1; i <= m; i++) {
        for (let j = 1; j <= n; j++) {
            if (str1[i - 1] === str2[j - 1]) {
                dp[i][j] = dp[i - 1][j - 1] + 1
            }
            else {
                dp[i][j] = Math.max(dp[i - 1][j], dp[i][j - 1]);
            }
        }
    }
    
    let i = m;
    let j = n;
    const scs = [];
    
    while (i > 0 || j > 0) {
        if (i > 0 && j > 0 && str1[i - 1] === str2[j - 1]) {
            scs.push(str1[i - 1]);
            i--;
            j--;
        }
        else if (j > 0 && (i === 0 || dp[i][j - 1] >= dp[i - 1][j])) {
            scs.push(str2[j - 1]);
            j--;
        }
        else {
            scs.push(str1[i - 1]);
            i--;
        }
    }
    return scs.reverse().join('');
};

//console.log(shortestCommonSupersequence("abac", "cab")); // Expect "cabac"
console.log(shortestCommonSupersequence("aaaaaaaa", "aaaaaaaa")); // Expect "aaaaaaaa"
