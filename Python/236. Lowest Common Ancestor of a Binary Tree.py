"""
Given a binary tree, find the lowest common ancestor (LCA) of two given nodes in the tree.
According to the definition of LCA on Wikipedia: 
    “The lowest common ancestor is defined between two nodes p and q as the lowest node in T that has both p and q as descendants 
    (where we allow a node to be a descendant of itself).
"""
# 236. Lowest Common Ancestor of a Binary Tree
from typing import Optional
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
class Solution:
    def lowestCommonAncestor(self, root: 'TreeNode', p: 'TreeNode', q: 'TreeNode') -> 'TreeNode':
        if not root or root == p or root == q:
            return root

        left = self.lowestCommonAncestor(root.left, p, q)
        right = self.lowestCommonAncestor(root.right, p, q)

        if left and right:
            return root

        return left if left else right
    
    
# Test Code
solution = Solution()
root = TreeNode(3, 
    TreeNode(5, 
        TreeNode(6), 
        TreeNode(2, TreeNode(7), TreeNode(4))
    ), 
    TreeNode(1, 
        TreeNode(0), 
        TreeNode(8)
    )
)

p = root.left  # Node 5
q = root.left.right.right  # Node 4

result = solution.lowestCommonAncestor(root, p, q)
print(result.val)