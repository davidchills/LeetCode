"""
Given the root of a binary tree, the level of its root is 1, the level of its children is 2, and so on.
Return the smallest level x such that the sum of all the values of nodes at level x is maximal.
"""
# 1161. Maximum Level Sum of a Binary Tree
from tree_utils import TreeNode, buildTree
from typing import Optional, List
from collections import deque
class Solution:
    def maxLevelSum(self, root: Optional[TreeNode]) -> int:
        if not root:
            return 0
        
        queue = deque([root])
        level = 1
        maxSum = root.val
        maxLevel = 1
        
        while queue:
            levelSize = len(queue)
            sumValue = 0
            for _ in range(levelSize):
                node = queue.popleft()
                sumValue += node.val
                if node.left:
                    queue.append(node.left)
                if node.right:
                    queue.append(node.right)
                    
            if sumValue > maxSum:
                maxSum = sumValue
                maxLevel = level
                
            level += 1
            
        return maxLevel
    
# Test Code
root1 = buildTree([1,7,0,7,-8,None,None]) # Expect 2
root2 = buildTree([989,None,10250,98693,-89388,None,None,None,-32127]) # Expect 2
root3 = buildTree([-100,-200,-300,-20,-5,-10,None]) # Expect 3
solution = Solution()
print(solution.maxLevelSum(root1))
print(solution.maxLevelSum(root2))
print(solution.maxLevelSum(root3))