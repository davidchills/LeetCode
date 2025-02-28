"""
Given two strings str1 and str2, return the shortest string that has both str1 and str2 as subsequences. 
    If there are multiple valid strings, return any of them.
A string s is a subsequence of string t if deleting some number of characters from t (possibly 0) results in the string s.
"""
# 1092. Shortest Common Supersequence 
class Solution:
    def shortestCommonSupersequence(self, str1: str, str2: str) -> str:
        m, n = len(str1), len(str2)
    
        # Step 1: Compute LCS DP table
        dp = [[0] * (n + 1) for _ in range(m + 1)]
        for i in range(1, m + 1):
            for j in range(1, n + 1):
                if str1[i - 1] == str2[j - 1]:
                    dp[i][j] = dp[i - 1][j - 1] + 1
                else:
                    dp[i][j] = max(dp[i - 1][j], dp[i][j - 1])
                    
        # Step 2: Backtrack to construct SCS
        i, j = m, n
        scs = []
    
        while i > 0 or j > 0:
            if i > 0 and j > 0 and str1[i - 1] == str2[j - 1]:  # LCS character
                scs.append(str1[i - 1])
                i -= 1
                j -= 1
            elif i > 0 and (j == 0 or dp[i - 1][j] >= dp[i][j - 1]):  # Prioritize `str1`
                scs.append(str1[i - 1])
                i -= 1
            else:  # Otherwise, take from `str2`
                scs.append(str2[j - 1])
                j -= 1
    
        scs.reverse()
        return "".join(scs)

    
# Test Code
solution = Solution()
#print(solution.shortestCommonSupersequence("abac", "cab")) # Expect "cabac"
#print(solution.shortestCommonSupersequence("aaaaaaaa", "aaaaaaaa")) # Expect "aaaaaaaa"
print(solution.shortestCommonSupersequence("babbbbaa", "baabbbbba")) # Expect "baabbbbbaa"
