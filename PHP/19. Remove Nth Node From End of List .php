<?php
/*
Given the head of a linked list, remove the nth node from the end of the list and return its head.
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
     * 19. Remove Nth Node From End of List
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $dummy = new ListNode(0, $head);
        $first = $dummy;
        $second = $dummy;

        for ($i = 0; $i <= $n; $i++) {
            $first = $first->next;
        }
        
        while ($first !== null) {
            $first = $first->next;
            $second = $second->next;
        }
        $second->next = $second->next->next;

        return $dummy->next;
    }
}

$c = new Solution;

//$head = createLinkedList([1,2,3,4,5]);
//$n = 2;
// Expect [1,2,3,5]

//$head = createLinkedList([1]);
//$n = 1;
// Expect []
    
$head = createLinkedList([1,2]);
$n = 1;
// Expect [1]    

//print_r($c->removeNthFromEnd($head, $n));

printLinkedList($c->removeNthFromEnd($head, $n));
?>