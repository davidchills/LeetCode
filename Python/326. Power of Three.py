"""
Given an integer n, return true if it is a power of three. Otherwise, return false.
An integer n is a power of three, if there exists an integer x such that n == 3x.
"""
# 326. Power of Three
from typing import List
class Solution:
    def isPowerOfThree(self, n: int) -> bool:
        if n < 1:
            return False
        while n % 3 == 0:
            n //= 3
        return n == 1       

    
# Test Code
solution = Solution()
print(solution.isPowerOfThree(27)) # Expect True
print(solution.isPowerOfThree(0)) # Expect False
print(solution.isPowerOfThree(-1)) # Expect False
