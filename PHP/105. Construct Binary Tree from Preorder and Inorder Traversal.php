<?php
/*
Given two integer arrays preorder and inorder where preorder is the preorder traversal of a binary tree and 
    inorder is the inorder traversal of the same tree, 
    construct and return the binary tree.
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
    if ($root === null) return;
    echo $root->val . " ";
    printPreorder($root->left);
    printPreorder($root->right);
}    
    
class Solution {

    /**
     * 105. Construct Binary Tree from Preorder and Inorder Traversal
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    public function buildTree(array $preorder, array $inorder): ?TreeNode {
        $n = count($preorder);
        if (empty($preorder) || empty($inorder)) { return null; }
        
        // HashMap to store index positions of inorder elements for O(1) lookup
        $inorderIndexMap = array_flip($inorder);        
        
        return $this->constructTree($preorder, 0, $n - 1, $inorder, 0, $n - 1, $inorderIndexMap);
    }
    

    private function constructTree(
        array &$preorder, 
        int $preLeft, 
        int $preRight, 
        array &$inorder, 
        int $inLeft, 
        int $inRight, 
        array &$inorderIndexMap): ?TreeNode {
        if ($preLeft > $preRight || $inLeft > $inRight) { return null; }
        
        // Root is always the first element of preorder
        $rootVal = $preorder[$preLeft];
        $root = new TreeNode($rootVal);
    
        // Find root index in inorder using hashmap
        $rootIndexInorder = $inorderIndexMap[$rootVal];
    
        // Calculate number of elements in the left subtree
        $leftSubtreeSize = $rootIndexInorder - $inLeft;
    
        // Recursively build left and right subtrees
        $root->left = $this->constructTree(
            $preorder, 
            $preLeft + 1, 
            $preLeft + $leftSubtreeSize, 
            $inorder, 
            $inLeft, 
            $rootIndexInorder - 1, 
            $inorderIndexMap);
            
        $root->right = $this->constructTree(
            $preorder, 
            $preLeft + $leftSubtreeSize + 1, 
            $preRight, 
            $inorder, 
            $rootIndexInorder + 1, 
            $inRight, 
            $inorderIndexMap);
        
        return $root;
    }    
}

$c = new Solution;
$preorder = [3,9,20,15,7];
$inorder = [9,3,15,20,7];
// Expected [3,9,20,null,null,15,7]
 
printPreorder($c->buildTree($preorder, $inorder));
?>