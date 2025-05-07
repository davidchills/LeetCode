"""
There is a dungeon with n x m rooms arranged as a grid.
You are given a 2D array moveTime of size n x m, where moveTime[i][j] 
    represents the minimum time in seconds when you can start moving to that room. 
You start from the room (0, 0) at time t = 0 and can move to an adjacent room. Moving between adjacent rooms takes exactly one second.
Return the minimum time to reach the room (n - 1, m - 1).
Two rooms are adjacent if they share a common wall, either horizontally or vertically.
"""
# 3341. Find Minimum Time to Reach Last Room I
from typing import List
import heapq
class Solution:
    def minTimeToReach(self, moveTime: List[List[int]]) -> int:
        n = len(moveTime)
        m = len(moveTime[0])
        
        INF = 10**18
        dist = [[INF] * m for _ in range(n)]
        
        pq = [(0, 0, 0)]
        dist[0][0] = 0
        
        dirs = [(1,0), (-1,0), (0,1), (0,-1)]
        
        while pq:
            t, i, j = heapq.heappop(pq)
            if t > dist[i][j]:
                continue

            if i == n-1 and j == m-1:
                return t
            
            for di, dj in dirs:
                ni, nj = i + di, j + dj
                if 0 <= ni < n and 0 <= nj < m:
                    new_time = max(t, moveTime[ni][nj]) + 1
                    if new_time < dist[ni][nj]:
                        dist[ni][nj] = new_time
                        heapq.heappush(pq, (new_time, ni, nj))
        
        return dist[n-1][m-1]    
    
# Test Code
solution = Solution()
print(solution.minTimeToReach([[0,4],[4,4]])) # Expect 6
print(solution.minTimeToReach([[0,0,0],[0,0,0]])) # Expect 3
print(solution.minTimeToReach([[0,1],[1,2]])) # Expect 3