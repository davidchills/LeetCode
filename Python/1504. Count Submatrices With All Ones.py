"""
Given an m x n binary matrix mat, return the number of submatrices that have all ones.
"""
# 1504. Count Submatrices With All Ones
from typing import List
class Solution:
    def numSubmat(self, mat: List[List[int]]) -> int:
        if not mat or not mat[0]:
            return 0

        m, n = len(mat), len(mat[0])
        heights = [0] * n
        ans = 0

        for i in range(m):
            # Update histogram heights for this row
            for j in range(n):
                heights[j] = heights[j] + 1 if mat[i][j] == 1 else 0

            # Monotonic stack: (height, count_of_consecutive_segments_merged)
            stack = []
            curr = 0  # number of all-ones submatrices ending at row i up to column j

            for j in range(n):
                cnt = 1
                while stack and stack[-1][0] >= heights[j]:
                    h, c = stack.pop()
                    curr -= h * c        # remove overcount from taller heights
                    cnt += c             # merge segments
                curr += heights[j] * cnt # add new contribution
                stack.append((heights[j], cnt))
                ans += curr

        return ans

    
# Test Code
solution = Solution()
print(solution.numSubmat([[1,0,1],[1,1,0],[1,1,0]])) # Expect 13
print(solution.numSubmat([[0,1,1,0],[0,1,1,1],[1,1,1,0]])) # Expect 24
