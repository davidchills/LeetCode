<?php
/*
Given two integer arrays, preorder and postorder where preorder is the preorder traversal of a binary tree of distinct values and postorder is the postorder traversal of the same tree, reconstruct and return the binary tree.

If there exist multiple answers, you can return any of them.
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

function printPostOrder($root) {
    if ($root === null) { return; }
    echo $root->val . " ";
    printPostOrder($root->left);
    printPostOrder($root->right);
}    
class Solution {

    /**
     * 889. Construct Binary Tree from Preorder and Postorder Traversal
     * @param Integer[] $preorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function constructFromPrePost($preorder, $postorder) {
        $postIndexMap = array_flip($postorder); // Hash map for O(1) lookups
        $preIndex = 0; // Pointer to track preorder traversal
    
        return $this->buildTree($preorder, $postIndexMap, $preIndex, 0, count($postorder) - 1);       
    }
    
    function buildTree(&$preorder, &$postIndexMap, &$preIndex, $postLeft, $postRight) {
        if ($preIndex >= count($preorder) || $postLeft > $postRight) { return null; }
    
        // Create the root from preorder traversal
        $rootVal = $preorder[$preIndex++];
        $root = new TreeNode($rootVal);
    
        // If this is a leaf node, return
        if ($postLeft == $postRight) { return $root; }
    
        // Find the position of the next preorder element in postorder
        $leftSubtreeRoot = $preorder[$preIndex]; // Next preorder element is always left or right child
        $leftSubtreeIndex = $postIndexMap[$leftSubtreeRoot];
    
        // Recursively construct left and right subtrees
        if ($leftSubtreeIndex < $postRight) { // Ensure it belongs to the subtree
            $root->left = $this->buildTree($preorder, $postIndexMap, $preIndex, $postLeft, $leftSubtreeIndex);
            $root->right = $this->buildTree($preorder, $postIndexMap, $preIndex, $leftSubtreeIndex + 1, $postRight - 1);
        }
    
        return $root;
    } 
}

$c = new Solution;
//printPostOrder($c->constructFromPrePost([1,2,4,5,3,6,7], [4,5,2,6,7,3,1])); // Expect [1,2,3,4,5,6,7]
//printPostOrder($c->constructFromPrePost([1], [1])); // Expect [1]
printPostOrder($c->constructFromPrePost([3,4,1,2], [1,4,2,3])); // Expect [3,4,2,1]
?>