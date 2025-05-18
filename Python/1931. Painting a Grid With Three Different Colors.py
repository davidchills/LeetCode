"""
You are given two integers m and n. Consider an m x n grid where each cell is initially white. 
You can paint each cell red, green, or blue. All cells must be painted.
Return the number of ways to color the grid with no two adjacent cells having the same color. 
Since the answer can be very large, return it modulo 10^9 + 7.
"""
# 1931. Painting a Grid With Three Different Colors
from typing import List
class Solution:
    def colorTheGrid(self, m: int, n: int) -> int:
        MOD = 10 ** 9 + 7

        # Generate all valid column colorings of height m (base-3 numbers with no equal adjacent)
        valid = []
        colors = []  # colors[i] = list of length m giving the i-th pattern's colors
        
        def decode(mask: int) -> List[int]:
            # decode mask in base-3 to length-m list
            res = [0] * m
            for i in range(m):
                res[i] = mask % 3
                mask //= 3
            return res

        total_masks = 3 ** m
        for mask in range(total_masks):
            col = decode(mask)
            # check no two adjacent in same column are equal
            ok = True
            for i in range(m - 1):
                if col[i] == col[i + 1]:
                    ok = False
                    break
            if ok:
                idx = len(valid)
                valid.append(mask)
                colors.append(col)

        P = len(valid)
        # Precompute compatibility: which patterns can follow another
        compat = [[] for _ in range(P)]
        for i in range(P):
            for j in range(P):
                # check for all rows k: colors[i][k] != colors[j][k]
                ok = True
                for k in range(m):
                    if colors[i][k] == colors[j][k]:
                        ok = False
                        break
                if ok:
                    compat[i].append(j)

        # DP over columns
        # dp[i] = number of ways to color up to current column ending with pattern i
        dp = [1] * P
        # for the remaining n-1 columns
        for _ in range(n - 1):
            new_dp = [0] * P
            for i in range(P):
                cnt = dp[i]
                if cnt:
                    for j in compat[i]:
                        new_dp[j] = (new_dp[j] + cnt) % MOD
            dp = new_dp

        # If n == 1, dp was initialized to all 1s
        return sum(dp) % MOD        
        
    
# Test Code
solution = Solution()
print(solution.colorTheGrid(1, 1)) # Expect 3
print(solution.colorTheGrid(1, 2)) # Expect 6
print(solution.colorTheGrid(5, 5)) # Expect 580986