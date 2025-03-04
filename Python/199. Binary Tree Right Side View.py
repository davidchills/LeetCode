"""
Given the root of a binary tree, imagine yourself standing on the right side of it, 
    return the values of the nodes you can see ordered from top to bottom.
"""
# 199. Binary Tree Right Side View
from typing import Optional, List
from collections import deque
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
class Solution:
    def rightSideView(self, root: Optional[TreeNode]) -> List[int]:
        if root is None:
            return []
        
        result = []
        queue = deque([root])
        
        while len(queue) > 0:
            size = len(queue)
            for i in range(0, size):
                node = queue.popleft()
                if i == size - 1:
                    result.append(node.val)
                    
                if node.left is not None:
                    queue.append(node.left)
                    
                if node.right is not None:
                    queue.append(node.right)
                    
        return result
    
# Test Code
solution = Solution()
root = TreeNode(1, 
    TreeNode(2,
        None,
        TreeNode(5, None, None)
    ),
    TreeNode(3, 
        None, 
        TreeNode(4, None, None)
    )
) # Expect [1,3,4]

print(solution.rightSideView(root))