"""
You are given the head of a linked list. Delete the middle node, and return the head of the modified linked list.
The middle node of a linked list of size n is the ⌊n / 2⌋th node from the start using 0-based indexing, 
    where ⌊x⌋ denotes the largest integer less than or equal to x.
For n = 1, 2, 3, 4, and 5, the middle nodes are 0, 1, 1, 2, and 2, respectively.
"""
# 2095. Delete the Middle Node of a Linked List
from typing import Optional, List
from build_linked_lists import ListNode, buildList, print_list
class Solution:
    def deleteMiddle(self, head: Optional[ListNode]) -> Optional[ListNode]:
        if not head or not head.next:
            return None
        
        slow = head
        fast = head
        prev = None
        
        while fast and fast.next:
            fast = fast.next.next
            prev = slow
            slow = slow.next
        
        if prev:
            prev.next = slow.next
        
        return head
    
# Test Code
#root = buildList([1,3,4,7,1,2,6]) # Expect [1,3,4,1,2,6]
#root = buildList([1,2,3,4]) # Expect [1,2,4]
root = buildList([2,1]) # Expect [2]
solution = Solution()
mod_head = solution.deleteMiddle(root)
print_list(mod_head)