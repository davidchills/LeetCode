"""
Given two strings word1 and word2, return the minimum number of operations required to convert word1 to word2.
You have the following three operations permitted on a word:
Insert a character
Delete a character
Replace a character
"""
# 72. Edit Distance
class Solution:
    def minDistance(self, word1: str, word2: str) -> int:
        len1 = len(word1)
        len2 = len(word2)
        
        # dp[i][j] = edit distance between word1[:i] and word2[:j]
        dp = [[0] * (len2 + 1) for _ in range(len1 + 1)]
        
        # Base cases: transforming empty string to prefix of the other
        for i in range(len1 + 1):
            dp[i][0] = i  # delete all i characters
        for j in range(len2 + 1):
            dp[0][j] = j  # insert all j characters
        
        # Fill the DP table
        for i in range(1, len1 + 1):
            for j in range(1, len2 + 1):
                if word1[i - 1] == word2[j - 1]:
                    # No operation needed if characters match
                    dp[i][j] = dp[i - 1][j - 1]
                else:
                    # Consider replace, delete, and insert
                    delete_cost = dp[i - 1][j] + 1     # delete word1[i-1]
                    insert_cost = dp[i][j - 1] + 1     # insert word2[j-1]
                    replace_cost = dp[i - 1][j - 1] + 1  # replace word1[i-1] with word2[j-1]
                    dp[i][j] = min(delete_cost, insert_cost, replace_cost)
        
        # The answer is the distance between the full strings
        return dp[len1][len2]
    
    
# Test Code
solution = Solution()
print(solution.minDistance("horse", "ros")) # Expect 3
print(solution.minDistance("intention", "execution")) # Expect 5
print(solution.minDistance("", "")) # Expect 0