"""
Given the head of a singly linked list, group all the nodes with odd indices together followed by 
    the nodes with even indices, and return the reordered list.
The first node is considered odd, and the second node is even, and so on.
Note that the relative order inside both the even and odd groups should remain as it was in the input.
You must solve the problem in O(1) extra space complexity and O(n) time complexity.
"""
# 328. Odd Even Linked List
from build_linked_lists import ListNode, buildList, print_list
from typing import Optional, List
class Solution:
    def oddEvenList(self, head: Optional[ListNode]) -> Optional[ListNode]:
        if head == None or head.next == None:
            return head
        
        odd = head
        even = head.next
        evenHead = even
        while even and even.next:
            odd.next = even.next
            odd = odd.next
            even.next = odd.next
            even = even.next
            
        odd.next = evenHead
        return head
        
    
# Test Code
head = buildList([1,2,3,4,5]) # Expect [1,3,5,2,4]
#head = buildList([2,1,3,5,6,4,7]) # Expect [2,3,6,7,1,5,4]
solution = Solution()
print_list(solution.oddEvenList(head))