"""
You are given the root of a binary tree.
A ZigZag path for a binary tree is defined as follow:
Choose any node in the binary tree and a direction (right or left).
If the current direction is right, move to the right child of the current node; otherwise, move to the left child.
Change the direction from right to left or from left to right.
Repeat the second and third steps until you can't move in the tree.
Zigzag length is defined as the number of nodes visited - 1. (A single node has a length of 0).
Return the longest ZigZag path contained in that tree.
"""
# 1372. Longest ZigZag Path in a Binary Tree
from typing import Optional, List, Tuple
from tree_utils import TreeNode, buildTree
class Solution:
    def longestZigZag(self, root: Optional[TreeNode]) -> int:
        self.maxLength = 0
        self.dfs(root)
        return self.maxLength
    
    def dfs(self, node: Optional[TreeNode]) -> tuple[int, int]:
        if not node:
            return (-1, -1)
        
        left = self.dfs(node.left)
        right = self.dfs(node.right)

        leftLen = left[1] + 1
        rightLen = right[0] + 1
        self.maxLength = max(self.maxLength, leftLen, rightLen)
        return (leftLen, rightLen)           
        
        
# Test Code
root1 = buildTree([1,None,1,1,1,None,None,1,1,None,1,None,None,None,1])
root2 = buildTree([1,1,1,None,1,None,None,1,1,None,1])
root3 = buildTree([1])
solution = Solution()
print(solution.longestZigZag(root1)) # Expect 3
print(solution.longestZigZag(root2)) # Expect 4
print(solution.longestZigZag(root3)) # Expect 0