"""
You are given a 2D integer matrix grid of size n x m, where each element is either 0, 1, or 2.
A V-shaped diagonal segment is defined as:
• The segment starts with 1.
• The subsequent elements follow this infinite sequence: 2, 0, 2, 0, ....
• The segment:
    • Starts along a diagonal direction (top-left to bottom-right, bottom-right to top-left, top-right to bottom-left, or bottom-left to top-right).
    • Continues the sequence in the same diagonal direction.
    • Makes at most one clockwise 90-degree turn to another diagonal direction while maintaining the sequence.
Return the length of the longest V-shaped diagonal segment. If no valid segment exists, return 0.
"""
# 3459. Length of Longest V-Shaped Diagonal Segment
from typing import List
import time
from functools import cache
class Solution:
    def lenOfVDiagonal(self, grid: List[List[int]]) -> int:
        
        """
        def dp(i,j,x,d,k):
            if not (0 <= i < n and 0 <= j < m): return 0
            if grid[i][j] != x: return 0
            res = dp(i + ds[d][0], j + ds[d][1], nx[x], d, k) + 1
            if k > 0:
                d2 = (d + 1) % 4
                res2 = dp(i + ds[d2][0], j + ds[d2][1], nx[x], d2, 0) + 1
                res = max(res, res2)
            return res

        ds = [[1,1],[1,-1],[-1,-1],[-1,1]]
        nx = [2,2,0]
        res = 0
        n, m = len(grid), len(grid[0])
        for i in range(n):
            for j in range(m):
                if grid[i][j] == 1:
                    cur = max(dp(i, j, 1, d, 1) for d in range(4))
                    res = max(res, cur)
        return res
        """
        
        dirs = [(1, 1), (1, -1), (-1, -1), (-1, 1)]
        n = len(grid)
        m = len(grid[0])
        nv = [2, 2, 0] # Next expected value

        @cache
        def helper(x, y, turned, dir):
            # First, we do not change the direction
            res = 1
            dx, dy = dirs[dir]
            if 0 <= x + dx < n and 0 <= y + dy < m and grid[x + dx][y + dy] == nv[grid[x][y]]:
                res = helper(x + dirs[dir][0], y + dirs[dir][1], turned, dir) + 1
            if not turned:
                dx, dy = dirs[(dir + 1) % 4]
                if 0 <= x + dx < n and 0 <= y + dy < m and grid[x + dx][y + dy] == nv[grid[x][y]]:
                    res = max(res, helper(x + dx, y + dy, True, (dir + 1) % 4) + 1)
            return res

        ans = 0
        for i in range(n):
            for j in range(m):
                if grid[i][j] == 1:
                    # Optimization: we can compute the theorically longest path. If the current answer is already better than this, we do not need to make the DFS.
                    tm = (n - i, j + 1, i + 1, m - j)
                    for d in range(4):
                        if tm[d] > ans:
                            ans = max(ans, helper(i, j, False, d))
        return ans    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.lenOfVDiagonal([[2,2,1,2,2],[2,0,2,2,0],[2,0,1,1,0],[1,0,2,2,2],[2,0,0,2,2]])) # Expect 5
print(solution.lenOfVDiagonal([[2,2,2,2,2],[2,0,2,2,0],[2,0,1,1,0],[1,0,2,2,2],[2,0,0,2,2]])) # Expect 4
print(solution.lenOfVDiagonal([[1,2,2,2,2],[2,2,2,2,0],[2,0,0,0,0],[0,0,2,2,2],[2,0,0,2,0]])) # Expect 5
print(solution.lenOfVDiagonal([[1]])) # Expect 1
end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")