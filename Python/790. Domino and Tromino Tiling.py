"""
You have two types of tiles: a 2 x 1 domino shape and a tromino shape. You may rotate these shapes.
Given an integer n, return the number of ways to tile an 2 x n board. Since the answer may be very large, return it modulo 10^9 + 7.
In a tiling, every square must be covered by a tile. 
Two tilings are different if and only if there are two 4-directionally 
    adjacent cells on the board such that exactly one of the tilings has both squares occupied by a tile.
"""
# 790. Domino and Tromino Tiling
from typing import List
class Solution:
    def numTilings(self, n: int) -> int:
        MOD = 10**9 + 7
        
        if n == 0:
            return 1
        if n < 3:
            return n

        full_cover = [0] * (n + 1)
        l_shaped_partial = [0] * (n + 1)
        
        full_cover[0] = 1
        full_cover[1] = 1
        full_cover[2] = 2
        l_shaped_partial[2] = 1
        
        for width in range(3, n + 1):
            full_cover[width] = (
                full_cover[width - 1]
                + full_cover[width - 2]
                + 2 * l_shaped_partial[width - 1]
            ) % MOD

            l_shaped_partial[width] = (
                l_shaped_partial[width - 1]
                + full_cover[width - 2]
            ) % MOD
        
        return full_cover[n]      
        
    
# Test Code
solution = Solution()
print(solution.numTilings(3)) # Expect 5
print(solution.numTilings(1)) # Expect 1