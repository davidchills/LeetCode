<?php
/*
Given the head of a linked list, reverse the nodes of the list k at a time, and return the modified list.

k is a positive integer and is less than or equal to the length of the linked list. If the number of nodes is not a multiple of k then left-out nodes, in the end, should remain as it is.

You may not alter the values in the list's nodes, only nodes themselves may be changed.
*/
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function createLinkedList($arr) {
    $head = new ListNode(array_shift($arr));
    $current = $head;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $head;
}

function printLinkedList($head) {
    $arr = [];
    while ($head !== null) {
        $arr[] = $head->val;
        $head = $head->next;
    }
    echo implode(" -> ", $arr) . "\n";
}
    
class Solution {

    /**
     * 25. Reverse Nodes in k-Group
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        if ($head === null || $k == 1) { return $head; }
    
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $current = $dummy;
        $prev = $dummy;
        $next = $dummy;
        $count = 0;
        
        while ($current->next !== null) {
            $current = $current->next;
            $count++;
        }
    
        while ($count >= $k) {
            $current = $prev->next;
            $next = $current->next;
            for ($i = 1; $i < $k; $i++) {
                $current->next = $next->next;
                $next->next = $prev->next;
                $prev->next = $next;
                $next = $current->next;
            }
            $prev = $current;
            $count -= $k;
        }
    
        return $dummy->next;        
    }
}

$c = new Solution;
/*
$head = createLinkedList([1,2,3,4,5]);
$k = 2;
// Expect [2,1,4,3,5]
*/    

$head = createLinkedList([1,2,3,4,5]);
$k = 3;
// Expect [3,2,1,4,5]

    
printLinkedList($c->reverseKGroup($head, $k));
?>