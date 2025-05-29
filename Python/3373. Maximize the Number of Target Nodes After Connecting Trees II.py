"""
There exist two undirected trees with n and m nodes, labeled from [0, n - 1] and [0, m - 1], respectively.
You are given two 2D integer arrays edges1 and edges2 of lengths n - 1 and m - 1, respectively, 
    where edges1[i] = [ai, bi] indicates that there is an edge between nodes ai and bi in the first tree and edges2[i] = [ui, vi] 
    indicates that there is an edge between nodes ui and vi in the second tree.
Node u is target to node v if the number of edges on the path from u to v is even. Note that a node is always target to itself.
Return an array of n integers answer, 
    where answer[i] is the maximum possible number of nodes that are target to node i of the first tree 
    if you had to connect one node from the first tree to another node in the second tree.
Note that queries are independent from each other. That is, for every query you will remove the added edge before proceeding to the next query.
"""
# 3373. Maximize the Number of Target Nodes After Connecting Trees II
from typing import List
from collections import deque
class Solution:
    def maxTargetNodes(self, edges1: List[List[int]], edges2: List[List[int]]) -> List[int]:
        def color_and_count(n, edges):
            adj = [[] for _ in range(n)]
            for u, v in edges:
                adj[u].append(v)
                adj[v].append(u)
            depth = [-1] * n
            depth[0] = 0
            q = deque([0])
            while q:
                u = q.popleft()
                for w in adj[u]:
                    if depth[w] < 0:
                        depth[w] = depth[u]^1
                        q.append(w)
                        
            c0 = depth.count(0)
            c1 = n - c0
            return depth, c0, c1

        n = len(edges1) + 1
        m = len(edges2) + 1

        depth1, c0_1, c1_1 = color_and_count(n, edges1)
        depth2, c0_2, c1_2 = color_and_count(m, edges2)

        best_even = max(c0_2, c1_2)
        best_odd  = max(m - c0_2, m - c1_2)

        ans = [0] * n
        for i in range(n):
            even1 = c0_1 if depth1[i] == 0 else c1_1
            ans[i] = even1 + max(best_even, best_odd)

        return ans        
        
    
# Test Code
solution = Solution()
print(solution.maxTargetNodes([[0,1],[0,2],[2,3],[2,4]], [[0,1],[0,2],[0,3],[2,7],[1,4],[4,5],[4,6]]))  # Expect [8,7,7,8,8]
print(solution.maxTargetNodes([[0,1],[0,2],[0,3],[0,4]], [[0,1],[1,2],[2,3]]))  # Expect [3,6,6,6,6]