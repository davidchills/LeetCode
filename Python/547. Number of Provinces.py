"""
There are n cities. Some of them are connected, while some are not. 
    If city a is connected directly with city b, and 
    city b is connected directly with city c, 
    then city a is connected indirectly with city c.
A province is a group of directly or indirectly connected cities and no other cities outside of the group.
You are given an n x n matrix isConnected where isConnected[i][j] = 1 if the ith city and the jth city are directly connected, 
    and isConnected[i][j] = 0 otherwise.
Return the total number of provinces.
"""
# 547. Number of Provinces
from typing import List
class Solution:
    def findCircleNum(self, isConnected: List[List[int]]) -> int:
        n = len(isConnected)
        visited = [False] * n
        count = 0
        
        def dfs(city: int):
            visited[city] = True
            for j in range(n):
                if isConnected[city][j] == 1 and not visited[j]:
                    dfs(j)
                    
        for i in range(n):
            if not visited[i]:
                dfs(i)
                count += 1
                
        return count
        
    
# Test Code
solution = Solution()
print(solution.findCircleNum([[1,1,0],[1,1,0],[0,0,1]])) # Expect 2
print(solution.findCircleNum([[1,0,0],[0,1,0],[0,0,1]])) # Expect 3