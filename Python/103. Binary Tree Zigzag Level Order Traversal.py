"""
Given the root of a binary tree, imagine yourself standing on the right side of it, 
    return the values of the nodes you can see ordered from top to bottom.
"""
# 103. Binary Tree Zigzag Level Order Traversal
from typing import Optional, List
from collections import deque
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
class Solution:
    def zigzagLevelOrder(self, root: Optional[TreeNode]) -> List[List[int]]:
        if root is None:
            return []
        
        result = []
        queue = deque([root])
        zigzag = False
        
        while len(queue) > 0:
            levelSize = len(queue)
            levelNodes = deque()
            for _ in range(0, levelSize):
                node = queue.popleft()
                if zigzag:
                    levelNodes.appendleft(node.val)
                else:
                    levelNodes.append(node.val)
                    
                if node.left is not None:
                    queue.append(node.left)
                    
                if node.right is not None:
                    queue.append(node.right)
            
            zigzag = not zigzag
            result.append(list(levelNodes))        
                
        return result
    
# Test Code
solution = Solution()
root = TreeNode(3, 
    TreeNode(9, None, None),
    TreeNode(20,
        TreeNode(15, None, None),
        TreeNode(7, None, None)
    )
) # Expect [[3],[20,9],[15,7]]

print(solution.zigzagLevelOrder(root))