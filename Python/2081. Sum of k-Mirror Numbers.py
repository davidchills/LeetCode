"""
A k-mirror number is a positive integer without leading zeros that reads the same both forward and backward in base-10 as well as in base-k.
For example, 9 is a 2-mirror number. The representation of 9 in base-10 and base-2 are 9 and 1001 respectively, 
    which read the same both forward and backward.
On the contrary, 4 is not a 2-mirror number. The representation of 4 in base-2 is 100, which does not read the same both forward and backward.
Given the base k and the number n, return the sum of the n smallest k-mirror numbers.
"""
# 2081. Sum of k-Mirror Numbers
from typing import List
class Solution:
    def kMirror(self, k: int, n: int) -> int:
        def isPalindromeInBase(x: int, base: int) -> bool:
            digits = []
            while x > 0:
                digits.append(x % base)
                x //= base
            return digits == digits[::-1]
        
        mirrors = []
        length = 1
        
        while len(mirrors) < n:
            halfLength = (length + 1) // 2
            start = 1 if halfLength == 1 else 10 ** (halfLength - 1)
            end = 10 ** halfLength
            
            for half in range(start, end):
                s = str(half)
                if length % 2 == 0:
                    palStr = s + s[::-1]
                else:
                    palStr = s + s[:-1][::-1]
                
                pal = int(palStr)
                if isPalindromeInBase(pal, k):
                    mirrors.append(pal)
                    if len(mirrors) == n:
                        break
            
            length += 1
        
        return sum(mirrors)       

    
# Test Code
solution = Solution()
print(solution.kMirror(2, 5)) # Expect 25
print(solution.kMirror(3, 7)) # Expect 499
print(solution.kMirror(7, 17)) # Expect 20379000
