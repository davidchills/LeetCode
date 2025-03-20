"""
There is an undirected weighted graph with n vertices labeled from 0 to n - 1.
You are given the integer n and an array edges, where edges[i] = [ui, vi, wi] indicates 
    that there is an edge between vertices ui and vi with a weight of wi.
A walk on a graph is a sequence of vertices and edges. The walk starts and ends with a vertex, 
    and each edge connects the vertex that comes before it and the vertex that comes after it. 
    It's important to note that a walk may visit the same edge or vertex more than once.
The cost of a walk starting at node u and ending at node v is defined as the bitwise AND of the weights of the edges traversed during the walk. 
    In other words, if the sequence of edge weights encountered during the walk is 
    w0, w1, w2, ..., wk, then the cost is calculated as w0 & w1 & w2 & ... & wk, where & denotes the bitwise AND operator.
You are also given a 2D array query, where query[i] = [si, ti]. For each query, you need to find the minimum cost of the walk starting at vertex si and ending at vertex ti. 
    If there exists no such walk, the answer is -1.
Return the array answer, where answer[i] denotes the minimum cost of a walk for query i.
"""
# 3108. Minimum Cost Walk in Weighted Graph
from typing import List
from collections import defaultdict, deque
class Solution:
    def minimumCost(self, n: int, edges: List[List[int]], query: List[List[int]]) -> List[int]:
        parent = [i for i in range(n)]
        size = [1] * n
        AND = [(1<<(31))-1] * n
        
        def root(u):
            if u == parent[u]:
                return u
            
            parent[u] = root(parent[u])
            return parent[u]
        
        def union_by_size(u, v, w):
            u = root(u)
            v = root(v)
            
            if u == v:
                AND[u] &= w
                return
            
            if size[u] < size[v]:
                (u,v) = (v,u)
                
            size[u] += size[v]
            parent[v] = u 
            AND[u] = AND[u] & AND[v] & w
            
        for u, v, w in edges:
            union_by_size(u, v, w)
            
        ans = []
        for u,v in query: 
            if u == v: 
                ans.append(0)
            elif root(u) == root(v):
                ans.append(AND[root(u)])
            else: 
                ans.append(-1)
                
        return ans  
    
# Test Code
solution = Solution()
print(solution.minimumCost(5, [[0,1,7],[1,3,7],[1,2,1]], [[0,3],[3,4]])) # Expect [1,-1]
print(solution.minimumCost(3, [[0,2,7],[0,1,15],[1,2,6],[1,2,1]], [[1,2]])) # Expect [0]