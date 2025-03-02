"""
Given the root of a complete binary tree, return the number of the nodes in the tree.
According to Wikipedia, every level, except possibly the last, is completely filled in a complete binary tree, 
    and all nodes in the last level are as far left as possible. It can have between 1 and 2h nodes inclusive at the last level h.
Design an algorithm that runs in less than O(n) time complexity.
"""
# 222. Count Complete Tree Nodes
from typing import Optional, List
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
class Solution:
    def countNodes(self, root: Optional[TreeNode]) -> int:
        if root is None:
            return 0
        
        def getDepth(node):
            depth = 0
            while node:
                node = node.left
                depth += 1
                
            return depth
        
        leftDepth = getDepth(root.left)
        rightDepth = getDepth(root.right)
        
        if leftDepth == rightDepth: 
            return (1 << leftDepth) + self.countNodes(root.right)
        else:
            return (1 << rightDepth) + self.countNodes(root.left)
            
    
# Test Code
solution = Solution()
root = TreeNode(1, 
    TreeNode(2,
        TreeNode(4),
        TreeNode(5),
    ), 
    TreeNode(3, 
        TreeNode(6)
    )
) #  Expect 6
print(solution.countNodes(root))