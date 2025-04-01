#!/usr/bin/env python3
"""
Utility for dealing with Trees in Leetcode challenges
from tree_utils import TreeNode, buildTree, print_tree
"""
from typing import Optional, List
from collections import deque
# Build a Tree stucture from an arr provided by Leetcode
def buildTree(arr):
    if not arr or arr[0] is None:
        return None

    root = TreeNode(arr[0])
    queue = deque([root])
    i = 1
    
    while i < len(arr):
        node = queue.popleft()

        if i < len(arr) and arr[i] is not None:
            node.left = TreeNode(arr[i])
            queue.append(node.left)
        
        i += 1

        if i < len(arr) and arr[i] is not None:
            node.right = TreeNode(arr[i])
            queue.append(node.right)
        
        i += 1

    return root
# Definition of the TreeNode
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right
        
def print_tree(root: Optional['TreeNode']) -> None:
    if not root:
        print("Empty tree")
        return

    queue = deque([root])
    level_vals = []
    while queue:
        level_size = len(queue)
        
        for _ in range(level_size):
            node = queue.popleft()
            level_vals.append(node.val)
            if node.left:
                queue.append(node.left)
            if node.right:
                queue.append(node.right)
                
    print(level_vals)
    