"""
Given the root of a binary search tree, and an integer k, 
    return the kth smallest value (1-indexed) of all the values of the nodes in the tree.
"""
# 230. Kth Smallest Element in a BST
from tree_utils import TreeNode, buildTree

from typing import Optional        
class Solution:
    def kthSmallest(self, root: Optional[TreeNode], k: int) -> int:
        stack = [[]];
        current = root
        count = 0
        
        while len(stack) > 0 or current is not None:
            while current is not None:
                stack.append(current)
                current = current.left
                
            current = stack.pop()
            count += 1
            
            if count == k:
                return current.val
            
            current = current.right
            
        return -1
        
    
# Test Code
solution = Solution()

root1 = buildTree([3,1,4,None,2])
root2 = buildTree([5,3,6,2,4,None,None,1])
#print(solution.kthSmallest(root1, 1)) # Expect 1
print(solution.kthSmallest(root2, 3)) # Expect 3