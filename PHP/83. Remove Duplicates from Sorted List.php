<?php
// 83. Remove Duplicates from Sorted List    
class ListNode {
    public $val;
    public $next;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

// Helper function to create a linked list from an array
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

// Helper function to print a linked list
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
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head) {
        
        $current = $head;

        while ($current !== null && $current->next !== null) {
            // Bump to the next if the next value is a duplicate.
            if ($current->val === $current->next->val) {
                $current->next = $current->next->next;
            } 
            else {
                // Assign back so we can deal with the next, next. 
                $current = $current->next; 
            }
        }
        return $head;
    }
}
$head = createLinkedList([1, 1, 1, 2, 2]); // Expect [1,2]
//$head = createLinkedList([1,1,2,3,3]); // Expect [1,2,3]

$c = new Solution;
//print_r($c->deleteDuplicates($head));
printLinkedList($c->deleteDuplicates($head));

?>