"""
You are given the root of a binary search tree (BST) and an integer val.
Find the node in the BST that the node's value equals val and return the subtree rooted with that node. 
    If such a node does not exist, return null.
"""
# 700. Search in a Binary Search Tree
from tree_utils import TreeNode, buildTree, print_tree
from typing import Optional, List
class Solution:
    def searchBST(self, root: Optional[TreeNode], val: int) -> Optional[TreeNode]:
        if not root:
            return None
        if root.val == val:
            return root
        elif val < root.val:
            return self.searchBST(root.left, val)
        else:
            return self.searchBST(root.right, val)
        
    
# Test Code
root1 = buildTree([4,2,7,1,3])
root2 = buildTree([4,2,7,1,3])
solution = Solution()
print_tree(solution.searchBST(root1, 2)) # Expect [2,1,3]
print_tree(solution.searchBST(root2, 5)) # Expect []