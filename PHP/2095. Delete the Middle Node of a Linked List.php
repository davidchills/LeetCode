<?php
/*
You are given the head of a linked list. Delete the middle node, and return the head of the modified linked list.
The middle node of a linked list of size n is the ⌊n / 2⌋th node from the start using 0-based indexing, 
    where ⌊x⌋ denotes the largest integer less than or equal to x.
For n = 1, 2, 3, 4, and 5, the middle nodes are 0, 1, 1, 2, and 2, respectively.
*/

include_once('./BuildLinkedLists.php');
class Solution {

    /**
     * 2095. Delete the Middle Node of a Linked List
     * @param ListNode $head
     * @return ListNode
     */
    function deleteMiddle($head) {
        if ($head === null || $head->next === null) { return null; } 

        $slow = $head;
        $fast = $head;
        $prev = null;

        while ($fast !== null && $fast->next !== null) {
            $prev = $slow;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        if ($prev !== null) {
            $prev->next = $slow->next;
        }

        return $head;
    }
}
//$head = createLinkedList([1,3,4,7,1,2,6]); // Expect [1,3,4,1,2,6]
//$head = createLinkedList([1,2,3,4]); // Expect [1,2,4]
$head = createLinkedList([2,1]); // Expect [2]
$c = new Solution;
printLinkedList($c->deleteMiddle($head));

?>