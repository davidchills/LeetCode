"""
Given the root of a binary tree, return the lowest common ancestor of its deepest leaves.
Recall that:
The node of a binary tree is a leaf if and only if it has no children
The depth of the root of the tree is 0. if the depth of a node is d, the depth of each of its children is d + 1.
The lowest common ancestor of a set S of nodes, is the node A with the largest depth such that every node in S is in the subtree with root A.
"""
# 1123. Lowest Common Ancestor of Deepest Leaves
from tree_utils import TreeNode, buildTree, print_tree
from typing import Optional, List
class Solution:
    def lcaDeepestLeaves(self, root: Optional[TreeNode]) -> Optional[TreeNode]:

        def dfs(node):
            if not node:
                return [0, None]
            
            [leftDepth, leftNode] = dfs(node.left)
            [rightDepth, rightNode] = dfs(node.right)
            if leftDepth == rightDepth:
                return [leftDepth + 1, node]
            elif leftDepth > rightDepth:
                return [leftDepth + 1, leftNode]
            else:
                return [rightDepth + 1, rightNode]
        
        return dfs(root)[1]
    
# Test Code
root1 = buildTree([3,5,1,6,2,0,8,None,None,7,4]) # Expect [2,7,4]
root2 = buildTree([1]) # Expect [1]
root3 = buildTree([0,1,3,None,2]) # Expect [2]
solution = Solution()
print_tree(solution.lcaDeepestLeaves(root1))
print_tree(solution.lcaDeepestLeaves(root2))
print_tree(solution.lcaDeepestLeaves(root3))