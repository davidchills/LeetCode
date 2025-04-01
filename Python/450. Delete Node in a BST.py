"""
Given a root node reference of a BST and a key, delete the node with the given key in the BST. 
    Return the root node reference (possibly updated) of the BST.
Basically, the deletion can be divided into two stages:
Search for a node to remove.
If the node is found, delete the node.
"""
# 450. Delete Node in a BST
from tree_utils import TreeNode, buildTree, print_tree
from typing import Optional, List
class Solution:
    def deleteNode(self, root: Optional[TreeNode], key: int) -> Optional[TreeNode]:
        if not root:
            return None
        
        if key < root.val:
            root.left = self.deleteNode(root.left, key)
            
        elif key > root.val:
            root.right = self.deleteNode(root.right, key)
            
        else:
            if not root.left:
                return root.right
            elif not root.right:
                return root.left
            
            minNode = self.getMin(root.right)
            root.val = minNode.val
            root.right = self.deleteNode(root.right, minNode.val)
            
        return root
    
    def getMin(self, node: Optional[TreeNode]) -> Optional[TreeNode]:
        while node.left:
            node = node.left
            
        return node
        
        
# Test Code
root1 = buildTree([5,3,6,2,4,None,7])
root2 = buildTree([5,3,6,2,4,None,7])
root3 = buildTree([]);
solution = Solution()
print_tree(solution.deleteNode(root1, 3)) # Expect [5,4,6,2,None,None,7]
print_tree(solution.deleteNode(root2, 0)) # Expect [5,3,6,2,4,None,7]
print_tree(solution.deleteNode(root3, 0)) # Expect []