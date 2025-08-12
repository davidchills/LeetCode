"""
Given two positive integers n and x.
Return the number of ways n can be expressed as the sum of the xth power of unique positive integers, in other words, 
    the number of sets of unique integers [n1, n2, ..., nk] where n = n1x + n2x + ... + nkx.
Since the result can be very large, return it modulo 10^9 + 7.
For example, if n = 160 and x = 3, one way to express n is n = 23 + 33 + 53.
"""
# 2787. Ways to Express an Integer as Sum of Powers
#from typing import List
class Solution:
    def numberOfWays(self, n: int, x: int) -> int:
        MOD = 10**9 + 7
        # Precompute all k-th powers <= n (each base can be used at most once)
        powers = []
        i = 1
        while True:
            p = i ** x
            if p > n:
                break
            powers.append(p)
            i += 1

        # 0/1 knapsack style DP: dp[s] = number of ways to make sum s
        dp = [0] * (n + 1)
        dp[0] = 1
        for p in powers:
            for s in range(n, p - 1, -1):
                dp[s] = (dp[s] + dp[s - p]) % MOD

        return dp[n]
    
# Test Code
solution = Solution()
print(solution.numberOfWays(10, 2)) # Expect 1
print(solution.numberOfWays(4, 1)) # Expect 2
