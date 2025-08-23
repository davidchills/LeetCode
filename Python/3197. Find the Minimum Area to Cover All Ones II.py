"""
You are given a 2D binary array grid. 
You need to find 3 non-overlapping rectangles having non-zero areas with horizontal and vertical sides such that all the 1's in grid lie inside these rectangles.
Return the minimum possible sum of the area of these rectangles.
Note that the rectangles are allowed to touch.
"""
# 3197. Find the Minimum Area to Cover All Ones II
from typing import List
from functools import lru_cache
class Solution:
    def minimumSum(self, grid: List[List[int]]) -> int:
        rows, cols = len(grid), len(grid[0])

        # Prefix sums for O(1) sum queries on any sub-rectangle [r1,r2) x [c1,c2)
        ps = [[0]*(cols+1) for _ in range(rows+1)]
        for r in range(rows):
            row_sum = 0
            for c in range(cols):
                row_sum += grid[r][c]
                ps[r+1][c+1] = ps[r][c+1] + row_sum

        def sum_region(r1: int, c1: int, r2: int, c2: int) -> int:
            """Sum of ones in half-open sub-rectangle [r1,r2) x [c1,c2)."""
            if r1 >= r2 or c1 >= c2:
                return 0
            return ps[r2][c2] - ps[r1][c2] - ps[r2][c1] + ps[r1][c1]

        def has_ones(r1: int, c1: int, r2: int, c2: int) -> bool:
            return sum_region(r1, c1, r2, c2) > 0

        def row_has_ones(r: int, c1: int, c2: int) -> bool:
            return sum_region(r, c1, r+1, c2) > 0

        def col_has_ones(c: int, r1: int, r2: int) -> bool:
            return sum_region(r1, c, r2, c+1) > 0

        def bbox_area(r1: int, c1: int, r2: int, c2: int) -> int:
            """Area of the tight bounding box of ones within [r1,r2) x [c1,c2). 0 if none."""
            if not has_ones(r1, c1, r2, c2):
                return 0
            top = r1
            while top < r2 and not row_has_ones(top, c1, c2):
                top += 1
            bottom = r2 - 1
            while bottom >= r1 and not row_has_ones(bottom, c1, c2):
                bottom -= 1
            left = c1
            while left < c2 and not col_has_ones(left, r1, r2):
                left += 1
            right = c2 - 1
            while right >= c1 and not col_has_ones(right, r1, r2):
                right -= 1
            if top > bottom or left > right:
                return 0
            return (bottom - top + 1) * (right - left + 1)

        @lru_cache(maxsize=None)
        def solve(r1: int, c1: int, r2: int, c2: int, k: int) -> int:
            """Minimum total area to cover all ones in [r1,r2) x [c1,c2) with at most k rectangles."""
            if not has_ones(r1, c1, r2, c2):
                return 0
            if k == 1:
                return bbox_area(r1, c1, r2, c2)

            best = solve(r1, c1, r2, c2, 1)  # It's never worse than using a single big rectangle.

            # Try vertical cuts c in (c1+1 .. c2-1)
            for c in range(c1 + 1, c2):
                # Only meaningful if both sides contain ones
                if not has_ones(r1, c1, r2, c) or not has_ones(r1, c, r2, c2):
                    continue
                # Split k into k1 and k2 such that k1 + k2 = k, k1,k2 >= 1
                for k1 in range(1, k):
                    k2 = k - k1
                    left = solve(r1, c1, r2, c, k1)
                    right = solve(r1, c, r2, c2, k2)
                    if left + right < best:
                        best = left + right

            # Try horizontal cuts r in (r1+1 .. r2-1)
            for r in range(r1 + 1, r2):
                if not has_ones(r1, c1, r, c2) or not has_ones(r, c1, r2, c2):
                    continue
                for k1 in range(1, k):
                    k2 = k - k1
                    top = solve(r1, c1, r, c2, k1)
                    bottom = solve(r, c1, r2, c2, k2)
                    if top + bottom < best:
                        best = top + bottom

            return best

        # We need exactly 3 rectangles (at most 3 yields same minimum because extra rectangles
        # can be empty in regions without ones)
        return solve(0, 0, rows, cols, 3)

    
# Test Code
solution = Solution()
print(solution.minimumSum([[1,0,1],[1,1,1]])) # Expect 5
print(solution.minimumSum([[1,0,1,0],[0,1,0,1]])) # Expect 5
