"""
A path in a binary tree is a sequence of nodes where each pair of adjacent nodes in the sequence has an edge connecting them. 
A node can only appear in the sequence at most once. Note that the path does not need to pass through the root.
The path sum of a path is the sum of the node's values in the path.
Given the root of a binary tree, return the maximum path sum of any non-empty path.
"""
# 124. Binary Tree Maximum Path Sum
from typing import Optional
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
class Solution:
    def maxPathSum(self, root: Optional[TreeNode]) -> int:
        self.maxSum = float('-inf')

        def dfs(node):
            if node == None:
                return 0
            
            leftMax = max(dfs(node.left), 0)
            rightMax = max(dfs(node.right), 0)
            
            currentPathSum = node.val + leftMax + rightMax
            
            self.maxSum = max(self.maxSum, currentPathSum)
            
            return node.val + max(leftMax, rightMax)
            
        dfs(root)
        return self.maxSum
    
# Test Code
solution = Solution()

#root = TreeNode(1, TreeNode(2, None, None), TreeNode(3, None, None))

root = TreeNode(-10, 
    TreeNode(9, None, None), 
    TreeNode(20,
        TreeNode(15, None, None),
        TreeNode(7, None, None)
    )
)

print(solution.maxPathSum(root))