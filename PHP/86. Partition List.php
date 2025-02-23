<?php
/*
Given the head of a linked list and a value x, partition it such that all nodes less than x come before nodes greater than or equal to x.

You should preserve the original relative order of the nodes in each of the two partitions.
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
     * 86. Partition List
     * @param ListNode $head
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x) {
        $beforeHead = new ListNode(0); // Dummy head for < x list
        $before = $beforeHead;
        $afterHead = new ListNode(0); // Dummy head for >= x list
        $after = $afterHead;
    
        while ($head !== null) {
            if ($head->val < $x) {
                $before->next = $head;
                $before = $before->next;
            } 
            else {
                $after->next = $head;
                $after = $after->next;
            }
            $head = $head->next;
        }
    
        $after->next = null; // Ensure the last node of 'after' list is null
        $before->next = $afterHead->next; // Connect before list to after list
    
        return $beforeHead->next;        
    }
}

$c = new Solution;

//$head = createLinkedList([1,4,3,2,5,2]);
//$x = 3;
// Expect [1,2,2,4,3,5]
    
//$head = createLinkedList([2,1]);
//$x = 2;
// Expect [1,2]
    
$head = createLinkedList([-8,-7,7,5,3,-7,-8,-1,9,-2,4,6,-4,-1,3,0,4,-8,-8,-8,8,6,-4,-4]);
$x = 0;
// Expected [-8,-7,-7,-8,-1,-2,-4,-1,-8,-8,-8,-4,-4,7,5,3,9,4,6,3,0,4,8,6]
    
printLinkedList($c->partition($head, $x));
?>