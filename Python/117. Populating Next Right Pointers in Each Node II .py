"""
Given a binary tree

struct Node {
  int val;
  Node *left;
  Node *right;
  Node *next;
}
Populate each next pointer to point to its next right node. If there is no next right node, the next pointer should be set to NULL.

Initially, all next pointers are set to NULL.
"""
# 117. Populating Next Right Pointers in Each Node II
from collections import deque
class Node:
    def __init__(self, val=0, left=None, right=None, next=None):
        self.val = val
        self.left = left
        self.right = right
        self.next = next
        
class Solution:
    def connect(self, root: 'Node') -> 'Node':
        if not root:
            return None

        queue = deque([root])
        
        while queue:
            size = len(queue)
            prev = None
            
            for i in range(size):
                node = queue.popleft()
                
                if prev:
                    prev.next = node
                
                prev = node
                
                if node.left:
                    queue.append(node.left)
                    
                if node.right:
                    queue.append(node.right)
            
            prev.next = None
        
        return root

def serialize_with_next(root: 'Node') -> list:
    if not root:
        return []
    
    queue = deque([root])
    result = []
    
    while queue:
        size = len(queue)
        level_nodes = []
        
        for i in range(size):
            node = queue.popleft()
            level_nodes.append(node.val if node else None)
            
            if node.left:
                queue.append(node.left)
                
            if node.right:
                queue.append(node.right)
        
        # Append '#' to indicate end of the level
        result.extend(level_nodes + ['#'])
    
    return result[:-1]  # Remove the last unnecessary '#'


# Helper function to build a tree from list input
def build_tree_from_list(values):
    if not values:
        return None

    root = Node(values[0])
    queue = deque([root])
    i = 1

    while queue and i < len(values):
        node = queue.popleft()

        if values[i] is not None:
            node.left = Node(values[i])
            queue.append(node.left)
        i += 1

        if i < len(values) and values[i] is not None:
            node.right = Node(values[i])
            queue.append(node.right)
        i += 1

    return root

# Example usage:
root_values = [1, 2, 3, 4, 5, None, 7]
root = build_tree_from_list(root_values)

solution = Solution()
solution.connect(root)
output = serialize_with_next(root)

print(output)  # Output: [1, '#', 2, 3, '#', 4, 5, 7, '#']