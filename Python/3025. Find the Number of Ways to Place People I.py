"""
You are given a 2D array points of size n x 2 representing integer coordinates of some points on a 2D plane, where points[i] = [xi, yi].
Count the number of pairs of points (A, B), where
• A is on the upper left side of B, and
• there are no other points in the rectangle (or line) they make (including the border).
Return the count.
"""
# 3025. Find the Number of Ways to Place People I
import time
from typing import List
class Solution:
    def numberOfPairs(self, points: List[List[int]]) -> int:
        # Sort by x-coordinate ascending, then by y-coordinate descending
        points.sort(key=lambda p: (p[0], -p[1]))
        n = len(points)
        count = 0
        
        for i in range(n):
            max_y = float('-inf')  # Track the maximum y we've seen for current x
            
            for j in range(i + 1, n):
                # Since points are sorted by x, points[j][0] >= points[i][0]
                # We need points[i][1] >= points[j][1] for upper-left relationship
                if points[i][1] >= points[j][1]:
                    # Check if this forms a valid rectangle (no points in between)
                    if points[j][1] > max_y:
                        count += 1
                    # Update max_y to the highest y-coordinate we've processed
                    max_y = max(max_y, points[j][1])
        
        return count

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.numberOfPairs([[1,1],[2,2],[3,3]])) # Expect 0
print(solution.numberOfPairs([[6,2],[4,4],[2,6]])) # Expect 2
print(solution.numberOfPairs([[3,1],[1,3],[1,1]])) # Expect 2

end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")