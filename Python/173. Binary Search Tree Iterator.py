"""
Implement the BSTIterator class that represents an iterator over the in-order traversal of a binary search tree (BST):
• BSTIterator(TreeNode root) Initializes an object of the BSTIterator class. 
    The root of the BST is given as part of the constructor. 
    The pointer should be initialized to a non-existent number smaller than any element in the BST.
• boolean hasNext() Returns true if there exists a number in the traversal to the right of the pointer, otherwise returns false.
• int next() Moves the pointer to the right, then returns the number at the pointer.
Notice that by initializing the pointer to a non-existent smallest number, the first call to next() will return the smallest element in the BST.
You may assume that next() calls will always be valid. That is, there will be at least a next number in the in-order traversal when next() is called.

"""
# 173. Binary Search Tree Iterator
from typing import Optional, List
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
class BSTIterator:

    def __init__(self, root: Optional[TreeNode]):
        self.stack = []
        self._leftmost_inorder(root)        

    def _leftmost_inorder(self, node):
        """ Helper function to push all leftmost nodes into stack """
        while node:
            self.stack.append(node)
            node = node.left
            
    def next(self) -> int:
        top_node = self.stack.pop()  # Get next in-order node
        
        if top_node.right:  # If it has a right child, push its leftmost nodes
            self._leftmost_inorder(top_node.right)
        
        return top_node.val     

    def hasNext(self) -> bool:
        return len(self.stack) > 0
    
# Test Code
root = TreeNode(7, 
    TreeNode(3),
    TreeNode(15,
        TreeNode(9),
        TreeNode(20)
    )
) 
c = BSTIterator(root)
print(c.next()) # Expect 3
print(c.next()) # Expect 7
print(c.hasNext()) # true
print(c.next()) # Expect 9
print(c.hasNext()) # true
print(c.next()) # Expect 15
print(c.hasNext()) # true
print(c.next()) # Expect 20
print(c.hasNext()) # false
