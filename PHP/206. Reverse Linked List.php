<?php
/*
Given the head of a singly linked list, reverse the list, and return the reversed list.
*/
include('./BuildLinkedLists.php');
class Solution {

    /**
     * 206. Reverse Linked List
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        if ($head === null) { return $head; }
        $prev = null;
        $current = $head;
        while ($current !== null) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }
        return $prev;
    }
}
$head = createLinkedList([1,2,3,4,5]); // Expect [5,4,3,2,1]
//$head = createLinkedList([1,2]); // Expect [2,1]
//$head = createLinkedList([]); // Expect []
$c = new Solution;
printLinkedList($c->reverseList($head));

?>