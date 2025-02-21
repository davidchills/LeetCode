<?php
/*
Given the head of a sorted linked list, delete all nodes that have duplicate numbers, 
    leaving only distinct numbers from the original list. Return the linked list sorted as well.
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
     * 82. Remove Duplicates from Sorted List II
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head) {
        if ($head === null) { return $head; }
        
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $prev = $dummy;
        $current = $head;

        while ($current !== null) {
            while ($current->next !== null && $current->val === $current->next->val) {
                $current = $current->next;
            }
            
            if ($prev->next === $current) { $prev = $prev->next; }
            else { $prev->next = $current->next; }
            
            $current = $current->next;

        }
        return $dummy->next;
    }
}

$c = new Solution;

//$head = createLinkedList([1,2,3,3,4,4,5]); // Expect [1,2,5]
$head = createLinkedList([1,1,1,2,3]); // Expect [2,3]

printLinkedList($c->deleteDuplicates($head));
?>