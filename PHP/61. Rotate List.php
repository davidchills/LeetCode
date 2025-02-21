<?php
/*
Given the head of a linked list, rotate the list to the right by k places.
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
     * 61. Rotate List
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        if ($head === null || $head->next === null || $k == 0) { return $head; }
        // Find the length
        $length = 1;
        $tail = $head;
        while ($tail->next !== null) {
            $tail = $tail->next;
            $length++;
        }        
        // Make the list circular
        $tail->next = $head;
        // Find the new head (rotate k % length)
        $k = $k % $length;
        $stepsToNewHead = $length - $k;
        $newTail = $head;
        
        for ($i = 1; $i < $stepsToNewHead; $i++) {
            $newTail = $newTail->next;
        }
        // Set new head
        $newHead = $newTail->next;
        $newTail->next = null;
    
        return $newHead;
    }
}

$c = new Solution;

//$head = createLinkedList([1,2,3,4,5]); // Expect [4,5,1,2,3]
//$k = 2;

$head = createLinkedList([0,1,2]); // Expect [2,0,1]
$k = 4;

printLinkedList($c->rotateRight($head, $k));
?>