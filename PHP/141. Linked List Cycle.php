<?php
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function createLinkedListWithCycle($values, $pos) {
    $head = new ListNode($values[0]);
    $current = $head;
    $nodes = [$head];

    for ($i = 1; $i < count($values); $i++) {
        $current->next = new ListNode($values[$i]);
        $current = $current->next;
        $nodes[] = $current;
    }

    if ($pos >= 0) {
        $current->next = $nodes[$pos]; // Create cycle
    }

    return $head;
}

/*
Given head, the head of a linked list, determine if the linked list has a cycle in it.

There is a cycle in a linked list if there is some node in the list that can be reached again by continuously following the next pointer. Internally, pos is used to denote the index of the node that tail's next pointer is connected to. Note that pos is not passed as a parameter.

Return true if there is a cycle in the linked list. Otherwise, return false.    
*/
class Solution {

    /**
     * 141. Linked List Cycle
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        if ($head === null || $head->next === null) {
            return false;
        }

        $slow = $head;      // Moves one step at a time
        $fast = $head->next; // Moves two steps at a time

        while ($slow !== $fast) {
            if ($fast === null || $fast->next === null) {
                return false; // Reached the end, no cycle
            }
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return true; // Slow and fast met, cycle detected        
    }
}


$c = new Solution;
//$head = createLinkedListWithCycle([3,2,0,-4], 1); // Expect true
//print_r($head);
//$head = createLinkedListWithCycle([1,2], 0); // Expect true
$head = createLinkedListWithCycle([1,2], -1); // Expect false
print_r($c->hasCycle($head));
?>