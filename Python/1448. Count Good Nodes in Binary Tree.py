"""
Given a binary tree root, a node X in the tree is named good if in the path from root to X there are no nodes with a value greater than X.
Return the number of good nodes in the binary tree.
"""
# 1448. Count Good Nodes in Binary Tree
from tree_utils import TreeNode, buildTree

class Solution:
    
    def dfs(self, node, currentMax) -> int:
        if node is None:
            return 0
        
        good = 1 if node.val >= currentMax else 0
        currentMax = max(currentMax, node.val)
        return good + self.dfs(node.left, currentMax) + self.dfs(node.right, currentMax)
        
        
    def goodNodes(self, root: TreeNode) -> int:
        minNum = -10**18
        return self.dfs(root, minNum)        
    
# Test Code
root1 = buildTree([3,1,4,3,None,1,5]) # Expect 4
root2 = buildTree([2,None,4,10,8,None,None,4]) # Expect 4
root3 = buildTree([3,3,None,4,2]) # Expect 3
root4 = buildTree([1]) # Expect 1
solution = Solution()
print(solution.goodNodes(root4))