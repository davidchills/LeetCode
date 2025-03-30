"""
You are given an array of k linked-lists lists, each linked-list is sorted in ascending order.
Merge all the linked-lists into one sorted linked-list and return it.
"""
# 23. Merge k Sorted Lists
from build_linked_lists import ListNode, buildList, print_list
from typing import Optional, List
class ListNode:
    def __init__(self, val: int = 0, next: Optional['ListNode'] = None):
        self.val = val
        self.next = next

    def __repr__(self):
        return str(self.val)

def print_list(head: Optional[ListNode]):
    result = []
    while head:
        result.append(head.val)
        head = head.next
    print(result)
    

import heapq
class Solution:
    def mergeKLists(self, lists: List[Optional[ListNode]]) -> Optional[ListNode]:
        if not lists:
            return ListNode().next
        heap = []
        counter = 0  # to prevent comparison of ListNode when values are equal
        for node in lists:
            if not node:
                continue
            heapq.heappush(heap, (node.val, counter, node))
            counter += 1

        dummy = ListNode()
        current = dummy

        while heap:
            val, _, node = heapq.heappop(heap)
            current.next = node
            current = current.next
            if node.next:
                heapq.heappush(heap, (node.next.val, counter, node.next))
                counter += 1

        return dummy.next
    
# Test Code
list1 = [buildList([1,4,5]), buildList([1,3,4]), buildList([2,6])] # Expect [1,1,2,3,4,4,5,6]
list2 = [buildList([])] # Expect []
list3 = [] # Expect []
solution = Solution()
print_list(solution.mergeKLists(list1))
print_list(solution.mergeKLists(list2))
print_list(solution.mergeKLists(list3))