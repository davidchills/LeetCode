/*
Given strings s1, s2, and s3, find whether s3 is formed by an interleaving of s1 and s2.
An interleaving of two strings s and t is a configuration where s and t are divided into n and m substrings respectively, such that:
s = s1 + s2 + ... + sn
t = t1 + t2 + ... + tm
|n - m| <= 1
The interleaving is s1 + t1 + s2 + t2 + s3 + t3 + ... or t1 + s1 + t2 + s2 + t3 + s3 + ...
Note: a + b is the concatenation of strings a and b.
    
97. Interleaving String    
*/
class Solution {
    func isInterleave(_ s1: String, _ s2: String, _ s3: String) -> Bool {
        let arr1 = Array(s1)
        let arr2 = Array(s2)
        let arr3 = Array(s3)
        
        let length1 = arr1.count
        let length2 = arr2.count
        let length3 = arr3.count
        
        if length1 + length2 != length3 {
            return false
        }
        
        var dp = Array(
            repeating: Array(repeating: false, count: length2 + 1),
            count: length1 + 1
        )
        dp[0][0] = true
        
        // Initialize first row (only from s2)
        for j in 1..<length2 + 1 {
            dp[0][j] = dp[0][j - 1] && (arr2[j - 1] == arr3[j - 1])
        }
        
        // Initialize first column (only from s1)
        for i in 1..<length1 + 1 {
            dp[i][0] = dp[i - 1][0] && (arr1[i - 1] == arr3[i - 1])
        }
        
        // Fill the rest of the DP table
        for i in 1..<length1 + 1 {
            for j in 1..<length2 + 1 {
                let fromS1 = dp[i - 1][j] && (arr1[i - 1] == arr3[i + j - 1])
                let fromS2 = dp[i][j - 1] && (arr2[j - 1] == arr3[i + j - 1])
                dp[i][j] = fromS1 || fromS2
            }
        }
        
        return dp[length1][length2]       
    }
}
let solution = Solution()
print(solution.isInterleave("aabcc", "dbbca", "aadbbcbcac")) // Expect true
print(solution.isInterleave("aabcc", "dbbca", "aadbbbaccc")) // Expect false
print(solution.isInterleave("", "", "")) // Expect true