<?php
/*
Given the root of a binary tree, determine if it is a valid binary search tree (BST).
A valid BST is defined as follows:
The left subtree of a node contains only nodes with keys less than the node's key.
The right subtree of a node contains only nodes with keys greater than the node's key.
Both the left and right subtrees must also be binary search trees.
*/
include './BuildTreeNode.php';
class Solution {

    /**
     * 98. Validate Binary Search Tree
     * @param TreeNode $root
     * @return Boolean
     */
    public function isValidBST(TreeNode $root): bool {
        return $this->validate($root, PHP_INT_MIN, PHP_INT_MAX);
    }
    
    private function validate(?TreeNode $node, int $min, int $max): bool {
        if ($node === null) { return true; }

        // BST property: Current node must be within (min, max)
        if ($node->val <= $min || $node->val >= $max) { return false; }

        // Recursively validate left is less & right is more
        return $this->validate($node->left, $min, $node->val) &&
               $this->validate($node->right, $node->val, $max);
    }    
}
//$root = buildTree([2,1,3]); // Expect true
$root = buildTree([5,1,4,null,null,3,6]); // Expect false
$c = new Solution;
print_r($c->isValidBST($root));
?>