<?php
/*
A linked list of length n is given such that each node contains an additional random pointer, which could point to any node in the list, or null.

Construct a deep copy of the list. The deep copy should consist of exactly n brand new nodes, where each new node has its value set to the value of its corresponding original node. Both the next and random pointer of the new nodes should point to new nodes in the copied list such that the pointers in the original list and copied list represent the same list state. None of the pointers in the new list should point to nodes in the original list.

For example, if there are two nodes X and Y in the original list, where X.random --> Y, then for the corresponding two nodes x and y in the copied list, x.random --> y.

Return the head of the copied linked list.

The linked list is represented in the input/output as a list of n nodes. Each node is represented as a pair of [val, random_index] where:

val: an integer representing Node.val
random_index: the index of the node (range from 0 to n-1) that the random pointer points to, or null if it does not point to any node.
Your code will only be given the head of the original linked list.    
*/
class Node {
    public $val;
    public $next;
    public $random;
    function __construct($val = 0, $next = null, $random = null) {
        $this->val = $val;
        $this->next = $next;
        $this->random = $random;
    }
}

function createLinkedList($arr) {
    $nodes = [];
    foreach ($arr as $item) {
        $nodes[] = new Node($item[0]);
    }
    foreach ($arr as $index => $item) {
        if (isset($nodes[$index + 1])) {
            $nodes[$index]->next = $nodes[$index + 1];
        }
        $nodes[$index]->random = $item[1] !== null ? $nodes[$item[1]] : null;
    }
    return $nodes[0];
}
    
function printList($head) {
    $arr = [];
    while ($head !== null) {
        $randomVal = $head->random ? $head->random->val : 'null';
        $arr[] = "[" . $head->val . "," . $randomVal . "]";
        $head = $head->next;
    }
    echo implode(" -> ", $arr) . "\n";
}
    
/*
Problem Description Goes Here
*/
class Solution {

    /**
     * 138. Copy List with Random Pointer
     * @param Node $head
     * @return Node
     */
    function copyRandomList($head) {
        if ($head === null) { return null; }

        $map = []; // Hash map to store mapping from original nodes to copied nodes

        $current = $head;
        // First pass: copy each node and store in the map
        while ($current !== null) {
            $map[spl_object_id($current)] = new Node($current->val);
            $current = $current->next;
        }

        $current = $head;
        // Second pass: assign next and random pointers
        while ($current !== null) {
            $copy = $map[spl_object_id($current)];
            $copy->next = $current->next ? $map[spl_object_id($current->next)] : null;
            $copy->random = $current->random ? $map[spl_object_id($current->random)] : null;
            $current = $current->next;
        }

        return $map[spl_object_id($head)];        
    }
}

$c = new Solution;

//$head = createLinkedList([[7,null],[13,0],[11,4],[10,2],[1,0]]); // Expect [[7,null],[13,0],[11,4],[10,2],[1,0]]
//$head = createLinkedList([[1,1],[2,1]]); // Expect [[1,1],[2,1]]
$head = createLinkedList([[3,null],[3,0],[3,null]]); // Expect [[3,null],[3,0],[3,null]]    

echo "Original list:\n";
printList($head);

$copiedHead = $c->copyRandomList($head);
echo "Copied list:\n";
printList($copiedHead);
?>