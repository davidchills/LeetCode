"""
Given a reference of a node in a connected undirected graph.
Return a deep copy (clone) of the graph.
Each node in the graph contains a value (int) and a list (List[Node]) of its neighbors.
"""
# 133. Clone Graph
from typing import List
class Node:
    def __init__(self, val: int, neighbors: List['Node'] = None):
        self.val = val
        self.neighbors = neighbors if neighbors is not None else []
        
from typing import Optional
class Solution:
    def cloneGraph(self, node: Optional['Node']) -> Optional['Node']:
        if not node:
            return None
        
        old_to_new = {}

        def dfs(n):
            if n in old_to_new:
                return old_to_new[n]

            copy = Node(n.val)
            old_to_new[n] = copy
            
            copy.neighbors = [dfs(neighbor) for neighbor in n.neighbors]
            return copy
        
        return dfs(node)
        
        
# Test Code
def printGraph(node: 'Node'):
    visited = set()
    def dfs(n):
        if n in visited:
            return
        visited.add(n)
        print(f"Node {n.val}: {[neighbor.val for neighbor in n.neighbors]}")
        for neighbor in n.neighbors:
            dfs(neighbor)
    dfs(node)


n1, n2, n3, n4 = Node(1), Node(2), Node(3), Node(4)
n1.neighbors = [n2, n3]
n2.neighbors = [n1, n3, n4]
n3.neighbors = [n1, n2]
n4.neighbors = [n2]

# ✅ Clone the Graph
solution = Solution()
cloned_graph = solution.cloneGraph(n1)

# ✅ Print the Original and Cloned Graphs
print("Original Graph:")
printGraph(n1)

print("\nCloned Graph:")
printGraph(cloned_graph)