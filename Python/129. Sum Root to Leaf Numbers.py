"""
You are given the root of a binary tree containing digits from 0 to 9 only.
Each root-to-leaf path in the tree represents a number.
For example, the root-to-leaf path 1 -> 2 -> 3 represents the number 123.
Return the total sum of all root-to-leaf numbers. Test cases are generated so that the answer will fit in a 32-bit integer.
A leaf node is a node with no children.
"""
# 129. Sum Root to Leaf Numbers
from typing import Optional
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
class Solution:
    def sumNumbers(self, root: Optional[TreeNode]) -> int:
        
        def dfs(node, currentSum):
            if node == None:
                return 0
            
            currentSum = currentSum * 10 + node.val
                        
            if node.left == None and node.right == None:
                return currentSum
            
            leftSum = dfs(node.left, currentSum)
            rightSum = dfs(node.right, currentSum)
        
            return leftSum + rightSum
            
        return dfs(root, 0)
    
# Test Code
solution = Solution()
#root = TreeNode(1, TreeNode(2, None, None), TreeNode(3, None, None)) # Expect 25

root = TreeNode(4, 
    TreeNode(9, 
        TreeNode(5, None, None), 
        TreeNode(1, None, None)
    ),
    TreeNode(0, None, None)
) # Expect 1026

print(solution.sumNumbers(root))