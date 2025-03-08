<?php
/*
Given the root of a binary search tree, and an integer k, 
    return the kth smallest value (1-indexed) of all the values of the nodes in the tree.
*/
include './BuildTreeNode.php';    
class Solution {
    private $count = 0;
    private $result = null;
    /**
     * 230. Kth Smallest Element in a BST
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($root, $k) {
        $this->count = 0;
        $this->inOrder($root, $k);
        return $this->result;        
    }

    private function inOrder($node, $k) {
        if ($node === null || $this->result !== null) return;

        // Left subtree
        $this->inOrder($node->left, $k);

        // Process current node
        $this->count++;
        if ($this->count === $k) {
            $this->result = $node->val;
            return;
        }

        // Right subtree
        $this->inOrder($node->right, $k);
    }
}

$c = new Solution;
//$root = buildTree([3,1,4,null,2]); // Expect 1
//$k = 1;
$root = buildTree([5,3,6,2,4,null,null,1]); // Expect 3
$k = 3;

print_r($c->kthSmallest($root, $k));
?>