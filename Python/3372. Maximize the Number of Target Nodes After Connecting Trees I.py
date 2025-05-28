"""
There exist two undirected trees with n and m nodes, with distinct labels in ranges [0, n - 1] and [0, m - 1], respectively.
You are given two 2D integer arrays edges1 and edges2 of lengths n - 1 and m - 1, respectively, where edges1[i] = [ai, bi] 
    indicates that there is an edge between nodes ai and bi in the first tree and edges2[i] = [ui, vi] 
    indicates that there is an edge between nodes ui and vi in the second tree. You are also given an integer k.
Node u is target to node v if the number of edges on the path from u to v is less than or equal to k. 
Note that a node is always target to itself.
Return an array of n integers answer, where answer[i] is the maximum possible number of nodes target to node i 
    of the first tree if you have to connect one node from the first tree to another node in the second tree.
Note that queries are independent from each other. That is, for every query you will remove the added edge before proceeding to the next query.
"""
# 3372. Maximize the Number of Target Nodes After Connecting Trees I
from typing import List
from collections import deque
class Solution:
    def maxTargetNodes(self, edges1: List[List[int]], edges2: List[List[int]], k: int) -> List[int]:
        n = len(edges1) + 1
        m = len(edges2) + 1
        
        adj1 = [[] for _ in range(n)]
        for u, v in edges1:
            adj1[u].append(v)
            adj1[v].append(u)
        
        adj2 = [[] for _ in range(m)]
        for u, v in edges2:
            adj2[u].append(v)
            adj2[v].append(u)
        
        def bfs_count(adj: List[List[int]], start: int, max_dist: int) -> int:
            if max_dist < 0:
                return 0
            seen = {start}
            q = deque([(start, 0)])
            cnt = 0
            while q:
                node, dist = q.popleft()
                if dist > max_dist:
                    continue
                cnt += 1
                for nei in adj[node]:
                    if nei not in seen:
                        seen.add(nei)
                        q.append((nei, dist + 1))
            return cnt
        
        count1 = [0] * n
        for u in range(n):
            count1[u] = bfs_count(adj1, u, k)
        
        best2 = 0
        radius2 = k - 1
        for v in range(m):
            cnt2 = bfs_count(adj2, v, radius2)
            if cnt2 > best2:
                best2 = cnt2
        
        return [count1[u] + best2 for u in range(n)]        
        
    
# Test Code
solution = Solution()
print(solution.maxTargetNodes([[0,1],[0,2],[2,3],[2,4]], [[0,1],[0,2],[0,3],[2,7],[1,4],[4,5],[4,6]], 2)) # Expect [9,7,9,8,8]
print(solution.maxTargetNodes([[0,1],[0,2],[0,3],[0,4]], [[0,1],[1,2],[2,3]], 1)) # Expect [6,3,3,3,3]
