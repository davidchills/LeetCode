<?php
/*
Given the roots of two binary trees p and q, write a function to check if they are the same or not.

Two binary trees are considered the same if they are structurally identical, and the nodes have the same value.
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
class Solution {

    /**
     * 100. Same Tree
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    private $pTree = []; 
    private $qTree = []; 
    function isSameTree($p, $q) {
        // Both are null, so they are the same
        if ($p === null && $q === null) { return true; }
    
        // One is null and the other is not, not the same
        if ($p === null || $q === null) { return false; }
    
        // Check values and recursively check left and right subtrees
        return ($p->val === $q->val) && $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
    }
}    

$c = new Solution;

$p = new TreeNode(1, new TreeNode(2), new TreeNode(3));
$q = new TreeNode(1, new TreeNode(2), new TreeNode(3));

//$p = new TreeNode(1, new TreeNode(2));
//$q = new TreeNode(1, null, new TreeNode(2));
print_r($c->isSameTree($p, $q));
?>