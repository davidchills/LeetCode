"""
You are given a string s consisting of lowercase English letters, an integer t representing the 
    number of transformations to perform, and an array nums of size 26. 
In one transformation, every character in s is replaced according to the following rules:
Replace s[i] with the next nums[s[i] - 'a'] consecutive characters in the alphabet. For example, if s[i] = 'a' and nums[0] = 3, 
    the character 'a' transforms into the next 3 consecutive characters ahead of it, which results in "bcd".
The transformation wraps around the alphabet if it exceeds 'z'. For example, if s[i] = 'y' and nums[24] = 3, the character 'y' 
    transforms into the next 3 consecutive characters ahead of it, which results in "zab".
Return the length of the resulting string after exactly t transformations.
Since the answer may be very large, return it modulo 10^9 + 7.
"""
# 3337. Total Characters in String After Transformations II
from typing import List
MOD = 10**9 + 7
class Solution:
    def lengthAfterTransformations(self, s: str, t: int, nums: List[int]) -> int:
        if t == 0:
            return len(s) % MOD

        M = [[0] * 26 for _ in range(26)]
        for c in range(26):
            for step in range(1, nums[c] + 1):
                d = (c + step) % 26
                M[c][d] = 1

        def matmul(A: List[List[int]], B: List[List[int]]) -> List[List[int]]:
            n = 26
            C = [[0] * n for _ in range(n)]
            for i in range(n):
                for k in range(n):
                    if A[i][k]:
                        aik = A[i][k]
                        rowB = B[k]
                        rowC = C[i]
                        for j in range(n):
                            rowC[j] = (rowC[j] + aik * rowB[j]) % MOD
            return C

        def matpow(A: List[List[int]], exp: int) -> List[List[int]]:
            n = 26
            result = [[0] * n for _ in range(n)]
            for i in range(n):
                result[i][i] = 1
            base = A
            while exp > 0:
                if exp & 1:
                    result = matmul(result, base)
                base = matmul(base, base)
                exp >>= 1
            return result

        Mt = matpow(M, t)

        f = [sum(Mt[c]) % MOD for c in range(26)]

        freq = [0] * 26
        for ch in s:
            freq[ord(ch) - ord('a')] += 1

        ans = 0
        for c in range(26):
            if freq[c]:
                ans = (ans + freq[c] * f[c]) % MOD

        return ans        
        
    
# Test Code
solution = Solution()
print(solution.lengthAfterTransformations("abcyy", 2, [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2])) # Expect 7
print(solution.lengthAfterTransformations("azbk", 1, [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2])) # Expect 8
