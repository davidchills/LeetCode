"""
Given an integer n, return an array ans of length n + 1 such that for each i (0 <= i <= n), 
    ans[i] is the number of 1's in the binary representation of i.
"""
# 338. Counting Bits
from typing import List
class Solution:
    def countBits(self, n: int) -> List[int]:
        dp = [0] * (n + 1)
        for i in range(1, n + 1):
            dp[i] = dp[i >> 1] + (i & 1)
        return dp        
    
# Test Code
solution = Solution()
print(solution.countBits(2)) # Expect [0,1,1]
print(solution.countBits(5)) # Expect [0,1,1,2,1,2]