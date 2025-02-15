<?php
/*
You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.
*/
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function createLinkedList($arr) {
    if (empty($arr)) { return null; }
    $head = new ListNode(array_shift($arr));
    $current = $head;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $head;
}
    
function printLinkedList($head) {
    $result = [];
    while ($head !== null) {
        $result[] = $head->val;
        $head = $head->next;
    }
    echo implode(" -> ", $result) . "\n";
}    
    
class Solution {

    /**
     * 92. Reverse Linked List II
     * @param ListNode $head
     * @param Integer $left
     * @param Integer $right
     * @return ListNode
     */
    function reverseBetween($head, $left, $right) {
        if ($head === null || $left === $right) { return $head; }
        $dummy = new ListNode(0, $head);
        $prev = $dummy;
        
        for ($i = 1; $i < $left; $i++) {
            $prev = $prev->next;
        }
        
        $current = $prev->next;
        $next = null;
        
        for ($i = 0; $i < $right - $left; $i++) {
            $next = $current->next;
            $current->next = $next->next;
            $next->next = $prev->next;
            $prev->next = $next;
        }
        
        return $dummy->next;
    }
}

$c = new Solution;

$head = createLinkedList([1,2,3,4,5]);
$left = 2;
$right = 4;
// Expect [1,4,3,2,5]

/*
$head = createLinkedList([5]);
$left = 1;
$right = 1;
// Expect [5]    
*/    



printLinkedList($c->reverseBetween($head, $left, $right));
?>