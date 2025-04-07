<?php
/*
You are given the root of a binary search tree (BST) and an integer val.
Find the node in the BST that the node's value equals val and return the subtree rooted with that node. 
    If such a node does not exist, return null.
*/
include('./BuildTreeNode.php');
class Solution {

    /**
     * 700. Search in a Binary Search Tree
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function searchBST($root, $val) {
        if ($root === null) { return null; }
        if ($root->val === $val) { return $root; }
        elseif ($val < $root->val) { 
            return $this->searchBST($root->left, $val);
        }
        else {
            return $this->searchBST($root->right, $val);
        }
    }
}
$root1 = buildTree([4,2,7,1,3]);
$root2 = buildTree([4,2,7,1,3]);
$c = new Solution;
printTree($c->searchBST($root1, 2)); // Expect [2,1,3]
printTree($c->searchBST($root2, 5)); // Expect []

?>