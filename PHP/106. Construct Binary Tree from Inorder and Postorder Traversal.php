<?php
/*
Given two integer arrays inorder and postorder where 
    inorder is the inorder traversal of a binary tree and 
    postorder is the postorder traversal of the same tree, construct and return the binary tree.
    Inorder Traversal → [Left, Root, Right]
    Postorder Traversal → [Left, Right, Root]
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
    
function printPostorder($root) {
    if ($root === null) return;
    echo $root->val . " ";
    printPostorder($root->left);
    printPostorder($root->right);
}    
    
class Solution {

    /**
     * 106. Construct Binary Tree from Inorder and Postorder Traversal
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    public function buildTree(array $inorder, array $postorder): ?TreeNode {
        if (empty($inorder) || empty($postorder)) { return null; }
        $n = count($postorder);
        // HashMap to store index positions of inorder elements for O(1) lookup
        $inorderIndexMap = array_flip($inorder); 
        
        // Start from the last element in postorder (root)
        $postIndex = $n - 1;
        
        return $this->constructTree($postorder, $postIndex, 0, $n - 1, $inorderIndexMap);
    }
    

    private function constructTree(
        array &$postorder, 
        int &$postIndex, 
        int $inLeft, 
        int $inRight, 
        array &$inorderIndexMap): ?TreeNode {
        if ($postIndex < 0 || $inLeft > $inRight) { return null; }
        
        // Root is always the last element of postorder
        $rootVal = $postorder[$postIndex--];
        $root = new TreeNode($rootVal);
    
        // Find root index in inorder using hashmap
        $rootIndexInorder = $inorderIndexMap[$rootVal];


        // Recursively build right subtree first (since postorder is Left-Right-Root)
        $root->right = $this->constructTree(
            $postorder, 
            $postIndex, 
            $rootIndexInorder + 1, 
            $inRight, 
            $inorderIndexMap);
            
        $root->left = $this->constructTree(
            $postorder, 
            $postIndex, 
            $inLeft, 
            $rootIndexInorder - 1, 
            $inorderIndexMap);
            
        return $root;
    }    
}

$c = new Solution;
$inorder = [9,3,15,20,7];
$postorder = [9,15,7,20,3];
// Expected [3,9,20,null,null,15,7]
 
printPostorder($c->buildTree($inorder, $postorder));
?>