"""
Consider all the leaves of a binary tree, from left to right order, the values of those leaves form a leaf value sequence.
"""
# 872. Leaf-Similar Trees
from tree_utils import TreeNode, buildTree
from typing import Optional
class Solution:
    def leafSimilar(self, root1: Optional[TreeNode], root2: Optional[TreeNode]) -> bool:
        return self.getLeafSequence(root1) == self.getLeafSequence(root2)
    
    def getLeafSequence(self, node: Optional[TreeNode]):
        leaves = []
        self.dfs(node, leaves)
        return leaves
        
    def dfs(self, node: Optional[TreeNode], leaves: list[int]):
        if node == None:
            return
        
        if node.left == None and node.right == None:
            leaves.append(node.val)
            
        self.dfs(node.left, leaves)
        self.dfs(node.right, leaves)
    
# Test Code
        #root1 = buildTree([3,5,1,6,2,9,8,None,None,7,4]);
        #root2 = buildTree([3,5,1,6,7,4,2,None,None,None,None,None,None,9,8]); # Expect True
root1 = buildTree([1,2,3]);
root2 = buildTree([1,3,2]); # Expect False        
solution = Solution()
print(solution.leafSimilar(root1, root2))