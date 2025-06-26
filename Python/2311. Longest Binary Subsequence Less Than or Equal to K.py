"""
You are given a binary string s and a positive integer k.
Return the length of the longest subsequence of s that makes up a binary number less than or equal to k.
Note:
The subsequence can contain leading zeroes.
The empty string is considered to be equal to 0.
A subsequence is a string that can be derived from another string by deleting some or 
    no characters without changing the order of the remaining characters.
"""
# 2311. Longest Binary Subsequence Less Than or Equal to K
class Solution:
    def longestSubsequence(self, s: str, k: int) -> int:
        n = len(s)
        ones = []
        for i, val in enumerate(s[::-1]):
            if val == '1':
                ones.append(i)
                
        ans = n - len(ones)
        i = 0
        
        while i < len(ones) and k - 2 ** ones[i] >= 0:
            ans += 1
            k -= 2 ** ones[i]
            i += 1
	
        return ans  

    
# Test Code
solution = Solution()
print(solution.longestSubsequence("1001010", 5)) # Expect 5
print(solution.longestSubsequence("00101001", 1)) # Expect 6
print(solution.longestSubsequence("00000", 878281126)) # Expect 5
print(solution.longestSubsequence("10", 232882982)) # Expect 2
print(solution.longestSubsequence("001010101011010100010101101010010", 93951055)) # Expect 31
