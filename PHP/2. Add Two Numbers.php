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
    if (empty($arr)) return null;
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
     * 2. Add Two Numbers
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $dummy = new ListNode();
        $current = $dummy;
        $carry = 0;
    
        while ($l1 !== null || $l2 !== null) {
            $val1 = ($l1 !== null && $l1->val) ? $l1->val : 0;
            $val2 = ($l2 !== null && $l2->val) ? $l2->val : 0;
            $sum = $val1 + $val2 + $carry;
            
            $carry = (int)($sum / 10);
            $sum = $sum % 10;
            
            $current->next = new ListNode($sum);
            $current = $current->next;
            
            if ($l1 !== null && $l1->next) {
                $l1 = $l1->next;
            }
            else { $l1 = null; }
            if ($l2 !== null && $l2->next) {
                $l2 = $l2->next;
            }            
            else { $l2 = null; }
        }
    
        if ($carry > 0) {
            $current->next = new ListNode($carry);
        }
    
        return $dummy->next;
    }
}

$c = new Solution;

//$l1 = createLinkedList([2,4,3]);
//$l2 = createLinkedList([5,6,4]); // Expect [7,0,8]

//$l1 = createLinkedList([0]);
//$l2 = createLinkedList([0]); // Expect [0]

$l1 = createLinkedList([9,9,9,9,9,9,9]);
$l2 = createLinkedList([9,9,9,9]); // Expect [8,9,9,9,0,0,0,1]


printLinkedList($c->addTwoNumbers($l1, $l2));
?>