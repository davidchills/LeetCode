<?php
/*
Given a binary tree

struct Node {
  int val;
  Node *left;
  Node *right;
  Node *next;
}
Populate each next pointer to point to its next right node. If there is no next right node, the next pointer should be set to NULL.

Initially, all next pointers are set to NULL.
*/
class Node {
    public $val;
    public $left = null;
    public $right = null;
    public $next = null;
    
    function __construct($val = 0, $left = null, $right = null, $next = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
        $this->next = $next;
    }
}  
    
function printNextPointers($root) {
    $result = [];
    while ($root !== null) {
        $level = [];
        $curr = $root;
        while ($curr !== null) {
            $level[] = $curr->val;
            $curr = $curr->next;
        }
        $result[] = implode(" -> ", $level) . " #";
        $root = $root->left ?: $root->right; // Move to next level
    }
    echo implode("\n", $result) . "\n";
}
    
class Solution {
    /**
     * 117. Populating Next Right Pointers in Each Node II
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        if ($root === null) { return null; }
        $queue = [$root];
        
        while (!empty($queue)) {
            $size = count($queue);
            $prev = null;
            
            for ($i = 0; $i < $size; $i++) {
                $node = array_shift($queue);
                if ($prev !== null) { $prev->next = $node; }
                $prev = $node;
    
                if ($node->left !== null) { $queue[] = $node->left; }
                if ($node->right !== null) { $queue[] = $node->right; }
            }
            $prev->next = null;
        }
        return $root;        
    }
}

$c = new Solution;
$root = new Node(1, new Node(2, new Node(4), new Node(5)), new Node(3, null, new Node(7))); // Expected [1,#,2,3,#,4,5,7,#]
//$root = []; // Expected [] 
printNextPointers($c->connect($root));
?>