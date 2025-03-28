<?php
/*
Given the head of a linked list, return the list after sorting it in ascending order.
*/
include('./LinkedLists.php');
class Solution {

    /**
     * 148. Sort List
     * @param ListNode $head
     * @return ListNode
     */
    function sortList(ListNode $head): ListNode {
        if (!$head || !$head->next) { return $head; }
        $mid = $this->getMid($head);
        $left = $head;
        $right = $mid->next;
        $mid->next = null;

        $sortedLeft = $this->sortList($left);
        $sortedRight = $this->sortList($right);

        return $this->merge($sortedLeft, $sortedRight);
    }
    
    private function getMid(ListNode $head): ListNode {
        $slow = $head;
        $fast = $head->next;

        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return $slow;
    }

    private function merge(ListNode $l1, ListNode $l2): ListNode {
        $dummy = new ListNode();
        $tail = $dummy;

        while ($l1 && $l2) {
            if ($l1->val < $l2->val) {
                $tail->next = $l1;
                $l1 = $l1->next;
            } 
            else {
                $tail->next = $l2;
                $l2 = $l2->next;
            }
            $tail = $tail->next;
        }

        if ($l1) { $tail->next = $l1; }
        else { $tail->next = $l2; }
        return $dummy->next;
    }    
}

$c = new Solution;
$head = createLinkedList([4,2,1,3]); // Expect [1,2,3,4]
//$head = createLinkedList([-1,5,3,4,0]); // Expect [-1,0,3,4,5]
//$head = createLinkedList([]); // Expect []
printLinkedList($c->sortList($head));

?>