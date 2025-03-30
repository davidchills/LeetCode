<?php
/*
You are given an array of k linked-lists lists, each linked-list is sorted in ascending order.
Merge all the linked-lists into one sorted linked-list and return it.
*/
include('./LinkedLists.php');
class Solution {

    /**
     * 23. Merge k Sorted Lists
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $heap = new SplMinHeap();
        foreach ($lists as $node) {
            //$node = is_array($list) ? createLinkedList($list) : $list;
            if ($node !== null) {
                $heap->insert([$node->val, $node]);
            }
        }
        $dummy = new ListNode();
        $current = $dummy;        
        
        while (!$heap->isEmpty()) {
            list($val, $node) = $heap->extract();
            $current->next = new ListNode($val);
            $current = $current->next;

            if ($node->next !== null) {
                $heap->insert([$node->next->val, $node->next]);
            }
        }

        return $dummy->next;
    }
}

$c = new Solution;
$list1 = [createLinkedList([1,4,5]),createLinkedList([1,3,4]),createLinkedList([2,6])];
$list2 = [];
$list3 = [createLinkedList([])];
printLinkedList($c->mergeKLists($list1)); // [1,1,2,3,4,4,5,6]
printLinkedList($c->mergeKLists($list2)); // []
printLinkedList($c->mergeKLists($list3)); // []

?>