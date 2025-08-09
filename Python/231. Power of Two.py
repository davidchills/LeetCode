"""
Given an integer n, return true if it is a power of two. Otherwise, return false.
An integer n is a power of two, if there exists an integer x such that n == 2x.
"""
# 231. Power of Two
class Solution:
    def isPowerOfTwo(self, n: int) -> bool:
        return n > 0 and (n & (n - 1)) == 0

    
# Test Code
solution = Solution()
print(solution.isPowerOfTwo(1)) # Expect True
print(solution.isPowerOfTwo(16)) # Expect True
print(solution.isPowerOfTwo(3)) # Expect False
