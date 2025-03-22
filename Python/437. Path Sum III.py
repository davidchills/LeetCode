"""
Given the root of a binary tree and an integer targetSum, return the number of paths where the sum of the values along the path equals targetSum.
The path does not need to start or end at the root or a leaf, but it must go downwards (i.e., traveling only from parent nodes to child nodes).

"""
# 437. Path Sum III
from tree_utils import TreeNode, buildTree
from typing import List, Optional, Dict
from collections import defaultdict
class Solution:
    def pathSum(self, root: Optional[TreeNode], targetSum: int) -> int:
        if root == None:
            return 0
        
        prefixSum = defaultdict(int)
        prefixSum[0] = 1
        return self.dfs(root, 0, targetSum, prefixSum)
    
    def dfs(self, node: Optional[TreeNode], currentSum: int, targetSum: int, prefixSum: Dict[int, int]) -> int:
        if node is None:
            return 0
        
        currentSum += node.val
        numPaths = prefixSum[currentSum - targetSum]
        prefixSum[currentSum] += 1
        numPaths += self.dfs(node.left, currentSum, targetSum, prefixSum)
        numPaths += self.dfs(node.right, currentSum, targetSum, prefixSum)
        prefixSum[currentSum] -= 1
        return numPaths
        
    
# Test Code
root1 = buildTree([10,5,-3,3,2,None,11,3,-2,None,1]);
targetSum1 = 8; # Expect 3

root2 = buildTree([5,4,8,11,None,13,4,7,2,None,None,5,1]);
targetSum2 = 22; # Expect 3        
solution = Solution()
print(solution.pathSum(root1, targetSum1))
print(solution.pathSum(root2, targetSum2))