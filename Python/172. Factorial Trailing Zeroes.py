"""
Given an integer n, return the number of trailing zeroes in n!.
Note that n! = n * (n - 1) * (n - 2) * ... * 3 * 2 * 1.
"""
# 172. Factorial Trailing Zeroes
class Solution:
    def trailingZeroes(self, n: int) -> int:
        count = 0
        while n >= 5:
            n //= 5
            count += n
        return count
    
    
# Test Code
solution = Solution()
print(solution.trailingZeroes(3)) # Expect 0
print(solution.trailingZeroes(5)) # Expect 1
print(solution.trailingZeroes(0)) # Expect 0