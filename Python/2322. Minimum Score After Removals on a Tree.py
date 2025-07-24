"""
There is an undirected connected tree with n nodes labeled from 0 to n - 1 and n - 1 edges.
You are given a 0-indexed integer array nums of length n where nums[i] represents the value of the ith node. 
You are also given a 2D integer array edges of length n - 1 where edges[i] = [ai, bi] 
    indicates that there is an edge between nodes ai and bi in the tree.
Remove two distinct edges of the tree to form three connected components. For a pair of removed edges, the following steps are defined:
1. Get the XOR of all the values of the nodes for each of the three components respectively.
2. The difference between the largest XOR value and the smallest XOR value is the score of the pair.
• For example, say the three components have the node values: [4,5,7], [1,9], and [3,3,3]. 
The three XOR values are 4 ^ 5 ^ 7 = 6, 1 ^ 9 = 8, and 3 ^ 3 ^ 3 = 3. The largest XOR value is 8 and the smallest XOR value is 3. 
The score is then 8 - 3 = 5.
Return the minimum score of any possible pair of edge removals on the given tree.
"""
# 2322. Minimum Score After Removals on a Tree
from typing import List
from collections import defaultdict
class Solution:
    def minimumScore(self, nums: List[int], edges: List[List[int]]) -> int:
        n = len(nums)
        graph = defaultdict(list)
        for u, v in edges:
            graph[u].append(v)
            graph[v].append(u)

        xor = [0] * n             # xor[i] = XOR of subtree rooted at i
        parent = [-1] * n         # parent[i] = parent of node i in DFS tree
        in_time = [0] * n         # in_time[i] = DFS entry time
        out_time = [0] * n        # out_time[i] = DFS exit time
        time = [1]                # counter for DFS timing

        # Step 1: DFS to calculate subtree XORs and DFS timestamps
        def dfs(node: int, par: int):
            xor[node] = nums[node]
            parent[node] = par
            in_time[node] = time[0]
            time[0] += 1
            for neighbor in graph[node]:
                if neighbor != par:
                    dfs(neighbor, node)
                    xor[node] ^= xor[neighbor]
            out_time[node] = time[0]
            time[0] += 1

        dfs(0, -1)

        # Step 2: Determine ancestor-descendant relationship
        def is_ancestor(u: int, v: int) -> bool:
            return in_time[u] <= in_time[v] and out_time[v] <= out_time[u]

        total_xor = xor[0]
        result = float('inf')

        # Step 3: Try all unique pairs of nodes (as edge removals)
        nodes = [i for i in range(n) if parent[i] != -1]  # skip root
        for i in range(len(nodes)):
            for j in range(i + 1, len(nodes)):
                u, v = nodes[i], nodes[j]

                if is_ancestor(u, v):  # u is ancestor of v
                    a = xor[v]
                    b = xor[u] ^ xor[v]
                    c = total_xor ^ xor[u]
                elif is_ancestor(v, u):  # v is ancestor of u
                    a = xor[u]
                    b = xor[v] ^ xor[u]
                    c = total_xor ^ xor[v]
                else:
                    a = xor[u]
                    b = xor[v]
                    c = total_xor ^ xor[u] ^ xor[v]

                result = min(result, max(a, b, c) - min(a, b, c))

        return result       

    
# Test Code
solution = Solution()
print(solution.minimumScore([1,5,5,4,11], [[0,1],[1,2],[1,3],[3,4]])) # Expect 9
print(solution.minimumScore([5,5,2,4,4,2], [[0,1],[1,2],[5,2],[4,3],[1,3]])) # Expect 0

