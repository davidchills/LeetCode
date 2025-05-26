"""
There is a directed graph of n colored nodes and m edges. The nodes are numbered from 0 to n - 1.
You are given a string colors where colors[i] is a lowercase English letter representing the color of the ith node in this graph (0-indexed). 
You are also given a 2D array edges where edges[j] = [aj, bj] indicates that there is a directed edge from node aj to node bj.
A valid path in the graph is a sequence of nodes x1 -> x2 -> x3 -> ... -> xk such that there is a directed edge from xi to xi+1 for every 1 <= i < k. 
The color value of the path is the number of nodes that are colored the most frequently occurring color along that path.
Return the largest color value of any valid path in the given graph, or -1 if the graph contains a cycle.
"""
# 1857. Largest Color Value in a Directed Graph
from typing import List
from collections import deque, defaultdict
class Solution:
    def largestPathValue(self, colors: str, edges: List[List[int]]) -> int:
        n = len(colors)
        
        graph = defaultdict(list)
        in_degree = [0] * n
        
        for a, b in edges:
            graph[a].append(b)
            in_degree[b] += 1
        
        queue = deque()
        for i in range(n):
            if in_degree[i] == 0:
                queue.append(i)
        
        dp = [[0] * 26 for _ in range(n)]
        
        for i in range(n):
            color_idx = ord(colors[i]) - ord('a')
            dp[i][color_idx] = 1
        
        processed = 0
        max_color_value = 0
        
        while queue:
            node = queue.popleft()
            processed += 1
            
            max_color_value = max(max_color_value, max(dp[node]))
            
            for neighbor in graph[node]:
                for color in range(26):
                    if color == ord(colors[neighbor]) - ord('a'):
                        dp[neighbor][color] = max(dp[neighbor][color], dp[node][color] + 1)
                    else:
                        dp[neighbor][color] = max(dp[neighbor][color], dp[node][color])
                
                in_degree[neighbor] -= 1
                if in_degree[neighbor] == 0:
                    queue.append(neighbor)
        
        if processed != n:
            return -1
        
        return max_color_value
    
    
# Test Code
solution = Solution()
print(solution.largestPathValue("abaca", [[0,1],[0,2],[2,3],[3,4]])) # Expect 3
print(solution.largestPathValue("a", [[0,0]])) # Expect -1