"""
Given an array of points where points[i] = [xi, yi] represents a point on the X-Y plane, 
return the maximum number of points that lie on the same straight line.
"""
# 149. Max Points on a Line
from typing import List
from itertools import combinations
class Solution:
    def maxPoints(self, points: List[List[int]]) -> int:
        n = len(points) 
        if n <= 2: 
            return n

        maxPoints = 0
        for p1, p2 in combinations(points, 2):
            count = 0
            for p in points:
                if (p[1] - p1[1]) * (p2[0] - p1[0]) == (p[0] - p1[0]) * (p2[1] - p1[1]):
                    count += 1
            maxPoints = max(maxPoints, count)
            
        return maxPoints    
    
# Test Code
solution = Solution()
print(solution.maxPoints([[1,1],[2,2],[3,3]])) # Expect 3
print(solution.maxPoints([[1,1],[3,2],[5,3],[4,1],[2,3],[1,4]])) # Expect 4
