<?php
// 21. Merge Two Sorted Lists    
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
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    /*
    function mergeTwoLists($list1, $list2) {
        $dummy = new ListNode();
        $current = $dummy;
    
        while ($list1 !== null && $list2 !== null) {
            if ($list1->val <= $list2->val) {
                $current->next = $list1;
                $list1 = $list1->next;
            } 
            else {
                $current->next = $list2;
                $list2 = $list2->next;
            }
            $current = $current->next;
        }
    
        // Append remaining nodes from either list
        $current->next = ($list1 !== null) ? $list1 : $list2;
    
        return $dummy->next;        
    }
    */
    // Using recursion
    function mergeTwoLists($list1, $list2) {
        if ($list1 === null) { return $list2; }
        if ($list2 === null) { return $list1; }
        if($list1->val < $list2->val) {
            $list1->next = $this->mergeTwoLists($list1->next, $list2);
            return $list1;
        } 
        else {
            $list2->next = $this->mergeTwoLists($list2->next, $list1);
            return $list2;
        }
    }
}
$list1 = createLinkedList([1, 2, 4]);
$list2 = createLinkedList([1, 3, 5]);

//$list1 = createLinkedList([]);
//$list2 = createLinkedList([]);

//$list1 = createLinkedList([]);
//$list2 = createLinkedList([0]);

$c = new Solution;
printLinkedList($c->mergeTwoLists($list1, $list2));

//echo "Merged List: ";
//printLinkedList(mergeTwoLists($list1, $list2)); 
?>