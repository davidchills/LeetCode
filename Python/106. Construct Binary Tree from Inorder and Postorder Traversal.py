"""
Given two integer arrays inorder and postorder where 
    inorder is the inorder traversal of a binary tree and 
    postorder is the postorder traversal of the same tree, construct and return the binary tree.
    Inorder Traversal → [Left, Root, Right]
    Postorder Traversal → [Left, Right, Root]
"""
# 106. Construct Binary Tree from Inorder and Postorder Traversal
from typing import List, Optional

class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
class Solution:
    def buildTree(self, inorder: list[int], postorder: list[int]) -> Optional[TreeNode]:
        if not inorder or not postorder:
            return None
        
        # Root is always the last element of postorder
        root_val = postorder.pop()
        root = TreeNode(root_val)
        
        root_index = inorder.index(root_val)
        
        # Recursively build the right subtree first, since postorder is Left-Right-Root
        root.right = self.buildTree(inorder[root_index + 1:], postorder)
        root.left = self.buildTree(inorder[:root_index], postorder)        
        
        return root
    
# Example usage
def print_tree_preorder(root):
    if not root:
        return []
    return [root.val] + print_tree_preorder(root.left) + print_tree_preorder(root.right)

solution = Solution()
inorder = [9,3,15,20,7]
postorder = [9,15,7,20,3]
root = solution.buildTree(inorder, postorder)
print(print_tree_preorder(root)) # Expected [3,9,20,null,null,15,7]