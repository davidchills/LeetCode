"""
Given a positive integer n, write a function that returns the number of set bits in its binary representation 
(also known as the Hamming weight).
"""
# 191. Number of 1 Bits
from typing import List
class Solution:
    def hammingWeight(self, n: int) -> int:
        binary_str = bin(n)[2:]
        return binary_str.count('1')
    
# Test Code
solution = Solution()
print(solution.hammingWeight(11)) # Expect 3
print(solution.hammingWeight(128)) # Expect 1
print(solution.hammingWeight(2147483645)) # Expect 30