<?php
/*
Given the root of a binary tree, invert the tree, and return its root.
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
    
function printTree($node) {
    if ($node === null) { return; }
    echo $node->val . " ";
    printTree($node->left);
    printTree($node->right);
}
    
class Solution {

    /**
     * 226. Invert Binary Tree
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {
        if ($root === null) { return $root; }
        $leftNode = $root->left;
        $root->left = $this->invertTree($root->right);
        $root->right = $this->invertTree($leftNode);
        return $root;
    }
}
    
$root = new TreeNode(4, 
    new TreeNode(2, new TreeNode(1), new TreeNode(3)), 
    new TreeNode(7, new TreeNode(6), new TreeNode(9))
);

$c = new Solution;
printTree($c->invertTree($root));
?>