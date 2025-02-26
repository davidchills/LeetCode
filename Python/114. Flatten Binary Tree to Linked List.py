"""
Given the root of a binary tree, flatten the tree into a "linked list":

The "linked list" should use the same TreeNode class where the right child pointer points to the next node in the list 
    and the left child pointer is always null.
The "linked list" should be in the same order as a pre-order traversal of the binary tree.
"""
# 114. Flatten Binary Tree to Linked List
from typing import Optional

class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
class Solution:
    def flatten(self, root: Optional[TreeNode]) -> None:
        if root == None:
            return
        
        current = root
        while current != None:
            if current.left != None:
                predecessor = current.left
                while predecessor.right != None:
                    predecessor = predecessor.right
                
                predecessor.right = current.right
                current.right = current.left
                current.left = None
                
            current = current.right
        
    
def print_tree(root: 'TreeNode') -> list:
    current = root
    while current:
        print(current.val, end=" -> ")
        current = current.right
    print("None")
    
    
# Test Code
solution = Solution()
root = TreeNode(1, TreeNode(2, TreeNode(3), TreeNode(4)), TreeNode(5, None, TreeNode(6)))
solution.flatten(root)
print_tree(root)  # Output: 1 -> 2 -> 3 -> 4 -> 5 -> 6 -> None