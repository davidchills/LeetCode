"""
You are given a string s and an integer t, representing the number of transformations to perform. 
In one transformation, every character in s is replaced according to the following rules:
If the character is 'z', replace it with the string "ab".
Otherwise, replace it with the next character in the alphabet. For example, 'a' is replaced with 'b', 'b' is replaced with 'c', and so on.
Return the length of the resulting string after exactly t transformations.
Since the answer may be very large, return it modulo 10^9 + 7.
"""
# 3335. Total Characters in String After Transformations I
from typing import List
MOD = 10**9 + 7
class Solution:
    def lengthAfterTransformations(self, s: str, t: int) -> int:
        if t == 0:
            return len(s) % MOD

        n = 26
        M = [[0] * n for _ in range(n)]
        for i in range(25):
            M[i][i + 1] = 1
        M[25][0] = 1
        M[25][1] = 1

        def matmul(A, B):
            C = [[0] * n for _ in range(n)]
            for i in range(n):
                Ai = A[i]
                Ci = C[i]
                for k in range(n):
                    if Ai[k]:
                        a_ik = Ai[k]
                        Bk = B[k]
                        for j in range(n):
                            Ci[j] = (Ci[j] + a_ik * Bk[j]) % MOD
            return C

        def matpow(A, exp):
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

        f = [sum(row) % MOD for row in Mt]

        freq = [0] * n
        for ch in s:
            freq[ord(ch) - ord('a')] += 1

        total = 0
        for c in range(n):
            if freq[c]:
                total = (total + freq[c] * f[c]) % MOD

        return total        
        
    
# Test Code
solution = Solution()
print(solution.lengthAfterTransformations("abcyy", 2)) # Expect 7
print(solution.lengthAfterTransformations("azbk", 1)) # Expect 5