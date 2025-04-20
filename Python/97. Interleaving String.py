"""
Given strings s1, s2, and s3, find whether s3 is formed by an interleaving of s1 and s2.
An interleaving of two strings s and t is a configuration where s and t are divided into n and m substrings respectively, such that:
s = s1 + s2 + ... + sn
t = t1 + t2 + ... + tm
|n - m| <= 1
The interleaving is s1 + t1 + s2 + t2 + s3 + t3 + ... or t1 + s1 + t2 + s2 + t3 + s3 + ...
Note: a + b is the concatenation of strings a and b.
"""
# 97. Interleaving String
class Solution:
    def isInterleave(self, s1: str, s2: str, s3: str) -> bool:
        length1 = len(s1)
        length2 = len(s2)
        length3 = len(s3)
        # Length check
        if length1 + length2 != length3:
            return False
        
        dp = [[False] * (length2 + 1) for _ in range(length1 + 1)]
        dp[0][0] = True
        
        # Initialize first row
        for j in range(1, length2 + 1):
            dp[0][j] = dp[0][j - 1] and s2[j - 1] == s3[j - 1]
        
        # Initialize first column
        for i in range(1, length1 + 1):
            dp[i][0] = dp[i - 1][0] and s1[i - 1] == s3[i - 1]
        
        # Fill the table
        for i in range(1, length1 + 1):
            for j in range(1, length2 + 1):
                use_s1 = dp[i - 1][j] and s1[i - 1] == s3[i + j - 1]
                use_s2 = dp[i][j - 1] and s2[j - 1] == s3[i + j - 1]
                dp[i][j] = use_s1 or use_s2
        
        return dp[length1][length2]
    
# Test Code
solution = Solution()
print(solution.isInterleave("aabcc", "dbbca", "aadbbcbcac")) # Expect True
print(solution.isInterleave("aabcc", "dbbca", "aadbbbaccc")) # Expect False
print(solution.isInterleave("", "", "")) # Expect True