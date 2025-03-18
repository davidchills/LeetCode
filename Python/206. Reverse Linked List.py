"""
Given the head of a singly linked list, reverse the list, and return the reversed list.
"""
# 206. Reverse Linked List
from build_linked_lists import ListNode, buildList, print_list
from typing import Optional
class Solution:
    def reverseList(self, head: Optional[ListNode]) -> Optional[ListNode]:
        if head == None:
            return head
        
        prev = None
        current = head
        
        while current != None:
            next = current.next
            current.next = prev
            prev = current
            current = next
            
        return prev

    
# Test Code
head = buildList([1,2,3,4,5]) # Expect [5,4,3,2,1]
#head = buildList([1,2,3,4,5]) # Expect [5,4,3,2,1]
#head = buildList([1,2,3,4,5]) # Expect [5,4,3,2,1]
solution = Solution()
print_list(solution.reverseList(head))