"""
You are given positive integers n and m.
Define two integers as follows:
num1: The sum of all integers in the range [1, n] (both inclusive) that are not divisible by m.
num2: The sum of all integers in the range [1, n] (both inclusive) that are divisible by m.
Return the integer num1 - num2.
"""
# 2894. Divisible and Non-divisible Sums Difference
class Solution:
    def differenceOfSums(self, n: int, m: int) -> int:
        total = n * (n + 1) // 2
        k = n // m
        sumDiv = m * k * (k + 1) // 2
        sumNonDiv = total - sumDiv
        return sumNonDiv - sumDiv
        
    
# Test Code
solution = Solution()
print(solution.differenceOfSums(10, 3)) # Expect 19
print(solution.differenceOfSums(5, 6)) # Expect 15
print(solution.differenceOfSums(5, 1)) # Expect -15
