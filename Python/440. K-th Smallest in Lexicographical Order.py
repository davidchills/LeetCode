"""
Given two integers n and k, return the kth lexicographically smallest integer in the range [1, n].
"""
# 440. K-th Smallest in Lexicographical Order
from typing import List
class Solution:
    def findKthNumber(self, n: int, k: int) -> int:
        
        def skipTrees(prefix1: int, prefix2: int) -> int:
            count = 0
            while prefix1 <= n:
                count += min(n + 1, prefix2) - prefix1
                prefix1 *= 10
                prefix2 *= 10
            return count
        
        current = 1
        kth = k - 1 # Using the first number (1).
        
        while kth > 0:
            count = skipTrees(current, current + 1)
            if kth >= count:
                # Skip this subtree.
                kth -= count
                current += 1
            else:
                # Answer is in this subtree.
                kth -= 1
                current *= 10
                
        return current
        
        
    
# Test Code
solution = Solution()
print(solution.findKthNumber(13, 2)) # Expect 10
print(solution.findKthNumber(1, 1)) # Expect 1
print(solution.findKthNumber(100, 10)) # Expect 17
