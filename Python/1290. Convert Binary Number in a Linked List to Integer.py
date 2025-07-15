"""
Given head which is a reference node to a singly-linked list. The value of each node in the linked list is either 0 or 1. 
The linked list holds the binary representation of a number.
Return the decimal value of the number in the linked list.
The most significant bit is at the head of the linked list.
"""
# 1290. Convert Binary Number in a Linked List to Integer
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
        
class Solution:
    def getDecimalValue(self, head: Optional[ListNode]) -> int:
        result = 0
        while head:
            result = result * 2 + head.val
            head = head.next
        return result       

    
# Test Code
solution = Solution()
head1 = buildList([1,0,1])
print(solution.getDecimalValue(head1)) # Expect 5
head2 = buildList([0])
print(solution.getDecimalValue(head2)) # Expect 0
