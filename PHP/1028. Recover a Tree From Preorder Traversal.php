<?php
/*
We run a preorder depth-first search (DFS) on the root of a binary tree.

At each node in this traversal, we output D dashes (where D is the depth of this node), then we output the value of this node.  If the depth of a node is D, the depth of its immediate child is D + 1.  The depth of the root node is 0.

If a node has only one child, that child is guaranteed to be the left child.

Given the output traversal of this traversal, recover the tree and return its root.
*/
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function printPreorder($root) {
    if ($root === null) { return; }
    echo $root->val . " ";
    printPreorder($root->left);
    printPreorder($root->right);
}
    
class Solution {

    /**
     * 1028. Recover a Tree From Preorder Traversal
     * @param String $traversal
     * @return TreeNode
     */
    function recoverFromPreorder($traversal) {
        $stack = [];
        $i = 0;
        $n = strlen($traversal);
    
        while ($i < $n) {
            // Step 1: Determine depth (count dashes)
            $depth = 0;
            while ($i < $n && $traversal[$i] == '-') {
                $depth++;
                $i++;
            }
    
            // Step 2: Read the node value
            $num = 0;
            while ($i < $n && is_numeric($traversal[$i])) {
                $num = $num * 10 + (int)$traversal[$i];
                $i++;
            }
    
            // Step 3: Create the node
            $node = new TreeNode($num);
    
            // Step 4: Attach to the correct parent
            if ($depth == count($stack)) { 
                if (!empty($stack)) {
                    $stack[count($stack) - 1]->left = $node; // Set as left child
                }
            } 
            else {
                while (count($stack) > $depth) {
                    array_pop($stack);
                }
                $stack[count($stack) - 1]->right = $node; // Set as right child
            }
    
            // Step 5: Push new node onto stack
            $stack[] = $node;
        }
    
        return $stack[0]; // Root node        
    }
}

$c = new Solution;
printPreorder($c->recoverFromPreorder("1-401--349---90--88")); // Expect [1,401,null,349,88,90]
//printPreorder($c->recoverFromPreorder("1-2--3---4-5--6---7")); // Expect [1,2,5,3,null,6,null,4,null,7]
//printPreorder($c->recoverFromPreorder("1-401--349---90--88")); // Expect [1,401,null,349,88,90]
?>