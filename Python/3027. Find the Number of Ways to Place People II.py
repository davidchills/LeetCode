"""
You are given a 2D array points of size n x 2 representing integer coordinates of some points on a 2D-plane, where points[i] = [xi, yi].
We define the right direction as positive x-axis (increasing x-coordinate) and the left direction as negative x-axis (decreasing x-coordinate). 
Similarly, we define the up direction as positive y-axis (increasing y-coordinate) and the down direction as negative y-axis (decreasing y-coordinate)
You have to place n people, including Alice and Bob, at these points such that there is exactly one person at every point. 
Alice wants to be alone with Bob, so Alice will build a rectangular fence with Alice's position as the upper left corner and 
    Bob's position as the lower right corner of the fence (Note that the fence might not enclose any area, i.e. it can be a line). 
If any person other than Alice and Bob is either inside the fence or on the fence, Alice will be sad.
Return the number of pairs of points where you can place Alice and Bob, such that Alice does not become sad on building the fence.
Note that Alice can only build a fence with Alice's position as the upper left corner, and Bob's position as the lower right corner. 
For example, Alice cannot build either of the fences in the picture below with four corners (1, 1), (1, 3), (3, 1), and (3, 3), because:
With Alice at (3, 3) and Bob at (1, 1), Alice's position is not the upper left corner and Bob's position is not the lower right corner of the fence.
With Alice at (1, 3) and Bob at (1, 1), Bob's position is not the lower right corner of the fence.
"""
# 3027. Find the Number of Ways to Place People II
import time
from typing import List
class Solution:
    def numberOfPairs(self, points: List[List[int]]) -> int:
        points.sort(key=lambda x: (x[0], -x[1]))
        n = len(points)
        result = 0

        for i in range(n):
            top = points[i][1]
            bot = float("-inf")
            for j in range(i + 1, n):
                y = points[j][1]
                if bot < y <= top:
                    result += 1
                    bot = y
                    if bot == top:
                        break
        return result

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.numberOfPairs([[1,1],[2,2],[3,3]])) # Expect 0
print(solution.numberOfPairs([[6,2],[4,4],[2,6]])) # Expect 2
print(solution.numberOfPairs([[3,1],[1,3],[1,1]])) # Expect 2

end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")