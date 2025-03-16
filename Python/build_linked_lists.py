#!/usr/bin/env python3
"""
Utility for dealing with Linked Lists in Leetcode challenges
from build_linked_lists import ListNode, buildList, print_list
"""
from typing import Optional, List
from collections import deque
# Definition of the ListNode
class ListNode:
    def __init__(self, val=0, next=None):
        self.val = val
        self.next = next
        
# Build a Linked List stucture from an arr provided by Leetcode
def buildList(arr):
    if not arr or arr[0] is None:
        return None

    root = ListNode(arr[0])
    queue = deque([root])
    i = 1
    
    while i < len(arr):
        node = queue.popleft()

        if i < len(arr) and arr[i] is not None:
            node.next = ListNode(arr[i])
            queue.append(node.next)
        
        i += 1
        
    return root

# Print a list node
def print_list(head: ListNode):
    while head:
        print(head.val, end=" -> " if head.next else "\n")
        head = head.next
        
        

        
