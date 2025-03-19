"""
In a linked list of size n, where n is even, the ith node (0-indexed) of the linked list is known as the twin of the (n-1-i)th node, 
    if 0 <= i <= (n / 2) - 1.
For example, if n = 4, then node 0 is the twin of node 3, and node 1 is the twin of node 2. These are the only nodes with twins for n = 4.
The twin sum is defined as the sum of a node and its twin.
Given the head of a linked list with even length, return the maximum twin sum of the linked list.
"""
# 2130. Maximum Twin Sum of a Linked List
from build_linked_lists import ListNode, buildList, print_list
from typing import Optional
class Solution:
    def pairSum(self, head: Optional[ListNode]) -> int:
        if head == None or head.next == None:
            return 0
        
        slow = head
        fast = head
        while fast != None and fast.next != None:
            slow = slow.next
            fast = fast.next.next
            
        secondHalf = self.reverseList(slow)
        maxSum = 0
        firstHalf = head
        while secondHalf != None:
            maxSum = max(maxSum, firstHalf.val + secondHalf.val)
            firstHalf = firstHalf.next
            secondHalf = secondHalf.next
            
        return maxSum
    
    def reverseList(self, head: Optional[ListNode]) -> ListNode:
        prev = None
        while head != None:
            next = head.next
            head.next = prev
            prev = head
            head = next
            
        return prev
        
    
# Test Code
    #head = buildList([5,4,2,1])  # Expect 6
    #head = buildList([4,2,2,3])  # Expect 7
head = buildList([1,100000])  # Expect 100001
solution = Solution()
print(solution.pairSum(head))