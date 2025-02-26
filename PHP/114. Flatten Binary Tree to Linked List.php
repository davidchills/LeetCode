<?php
/*
Given the root of a binary tree, flatten the tree into a "linked list":

The "linked list" should use the same TreeNode class where the right child pointer points to the next node in the list 
    and the left child pointer is always null.
The "linked list" should be in the same order as a pre-order traversal of the binary tree.
    Uses in-place Morris traversal
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
function printTree($root) {
    if ($root === null) { return; }
    echo $root->val . " ";
    //printTree($root->left);
    printTree($root->right);
}     
class Solution {

    /**
     * 114. Flatten Binary Tree to Linked List
     * @param TreeNode $root
     * @return NULL
     */
    public function flatten(TreeNode $root) {
        if ($root === null) { return $root; }
        //$traversed = $this->preorderTraversal($root);
        //return $this->reconstruct($traversed);
        $current = $root;
        while ($current !== null) {
            if ($current->left !== null) {
                $predecessor = $current->left;
                while ($predecessor->right !== null) {
                    $predecessor = $predecessor->right;
                }
                $predecessor->right = $current->right;
                // Move left the right
                $current->right = $current->left;
                // Set all the lefts to null
                $current->left = null;
            }
            $current = $current->right;
        }
    }
    // Not needed after In-Place Modification Using Morris Traversal
    private function preorderTraversal(?TreeNode $root): array {
        if ($root === null) { return []; }
        return array_merge(
            [$root->val], 
            $this->preorderTraversal($root->left), 
            $this->preorderTraversal($root->right)
        );
    }
    // Not needed after In-Place Modification Using Morris Traversal
    private function reconstruct(array $nodes): ?TreeNode {
        $root = new TreeNode($nodes[0]);
        $current = $root;
        for ($i = 1; $i < count($nodes); $i++) {
            $current->right = new TreeNode($nodes[$i]);
            //$current->right = new TreeNode();
            $current = $current->right;
        }
        return $root;
    }
}

$c = new Solution;
$root = new TreeNode(1, 
    new TreeNode(2, new TreeNode(3), new TreeNode(4)), 
    new TreeNode(5, null, new TreeNode(6))
);
$c->flatten($root); // Expect [1,null,2,null,3,null,4,null,5,null,6]
printTree($root);
?>