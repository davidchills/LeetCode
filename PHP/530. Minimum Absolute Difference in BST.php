<?php
/*
Given the root of a Binary Search Tree (BST), 
    return the minimum absolute difference between the values of any two different nodes in the tree.
*/
include './BuildTreeNode.php';   

class Solution {
    private $prev = null;
    private $minDiff = PHP_INT_MAX;
    /**
     * 530. Minimum Absolute Difference in BST
     * @param TreeNode $root
     * @return Integer
     */
    function getMinimumDifference($root) {
        $this->inOrder($root);
        return $this->minDiff;    
    }
    
    private function inOrder($node) {
        if ($node === null) return;

        // Left subtree
        $this->inOrder($node->left);

        // Process current node
        if ($this->prev !== null) {
            $this->minDiff = min($this->minDiff, $node->val - $this->prev);
        }
        $this->prev = $node->val;

        // Right subtree
        $this->inOrder($node->right);        
    }
}

$c = new Solution;
$root = buildTree([4,2,6,1,3]); // Expect 1
//$root = buildTree([1,0,48,null,null,12,49]); // Expect 1
print_r($c->getMinimumDifference($root));
?>