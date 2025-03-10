"""
Given the root of a binary tree, determine if it is a valid binary search tree (BST).
A valid BST is defined as follows:
The left subtree of a node contains only nodes with keys less than the node's key.
The right subtree of a node contains only nodes with keys greater than the node's key.
Both the left and right subtrees must also be binary search trees.
"""
# 98. Validate Binary Search Tree
from tree_utils import TreeNode, buildTree

from typing import Optional        
class Solution:
    def validate(self, node, minV, maxV):
        if node is None:
            return True
        
        if node.val <= minV or node.val >= maxV:
            return False
        
        return self.validate(node.left, minV, node.val) and self.validate(node.right, node.val, maxV)
    
    def isValidBST(self, root: Optional[TreeNode]) -> bool:
        return self.validate(root, float('-inf'), float('inf'))
        
    
# Test Code
solution = Solution()

#root = buildTree([2,1,3]) # Expect True
root = buildTree([5,1,4,None,None,3,6]) # Expect False
print(solution.isValidBST(root))