"""
You are given three integers n, m, k. A good array arr of size n is defined as follows:
Each element in arr is in the inclusive range [1, m].
Exactly k indices i (where 1 <= i < n) satisfy the condition arr[i - 1] == arr[i].
Return the number of good arrays that can be formed.
Since the answer may be very large, return it modulo 109 + 7.
"""
# 3405. Count the Number of Arrays with K Matching Adjacent Elements
import math
class Solution:
    def countGoodArrays(self, n: int, m: int, k: int) -> int:
        if k >= n: 
            return 0
        
        MOD = 10**9 + 7
        return m * pow(m - 1, n - k - 1, MOD) * math.comb(n - 1, k) % MOD       

    
# Test Code
solution = Solution()
print(solution.countGoodArrays(3, 2, 1)) # Expect 4
print(solution.countGoodArrays(4, 2, 2)) # Expect 6
print(solution.countGoodArrays(5, 2, 0)) # Expect 2
print(solution.countGoodArrays(40603, 16984, 29979)) # Expect 235077659