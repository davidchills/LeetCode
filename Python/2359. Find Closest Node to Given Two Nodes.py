"""
You are given a directed graph of n nodes numbered from 0 to n - 1, where each node has at most one outgoing edge.
The graph is represented with a given 0-indexed array edges of size n, indicating that there is a directed edge from node i to node edges[i]. 
If there is no outgoing edge from i, then edges[i] == -1.
You are also given two integers node1 and node2.
Return the index of the node that can be reached from both node1 and node2, 
    such that the maximum between the distance from node1 to that node, 
    and from node2 to that node is minimized. If there are multiple answers, 
    return the node with the smallest index, and if no possible answer exists, return -1.
Note that edges may contain cycles.
HINT: How can you find the shortest distance from one node to all nodes in the graph?
HINT: Use BFS to find the shortest distance from both node1 and node2 to all nodes in the graph. Then iterate over all nodes, and find the node with the minimum max distance.
"""
# 2359. Find Closest Node to Given Two Nodes
from typing import List
from collections import deque
class Solution:
    def closestMeetingNode(self, edges: List[int], node1: int, node2: int) -> int:
        n = len(edges)
        bestNode = -1
        minMaxDistance = float('inf')
        
        def bfsDistances(start: int) -> List[int]:
            distances = [-1] * n
            queue = deque([start])
            distances[start] = 0
            
            while queue:
                curr = queue.popleft()
                nextNode = edges[curr]
                
                if nextNode != -1 and distances[nextNode] == -1:
                    distances[nextNode] = distances[curr] + 1
                    queue.append(nextNode)
            
            return distances
        
        distances1 = bfsDistances(node1)
        distances2 = bfsDistances(node2)
        
        for i in range(n):
            if distances1[i] >= 0 and distances2[i] >= 0:
                maxDistance = max(distances1[i], distances2[i])
                if maxDistance < minMaxDistance:
                    minMaxDistance = maxDistance
                    bestNode = i
        
        return bestNode
    
    
# Test Code
solution = Solution()
print(solution.closestMeetingNode([2,2,3,-1], 0, 1)) # Expect 2
print(solution.closestMeetingNode([1,2,-1], 0, 2)) # Expect 2