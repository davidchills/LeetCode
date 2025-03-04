<?php
/*
Given a binary tree, find the lowest common ancestor (LCA) of two given nodes in the tree.
According to the definition of LCA on Wikipedia: 
    “The lowest common ancestor is defined between two nodes p and q as the lowest node in T that has both p and q as descendants 
    (where we allow a node to be a descendant of itself).”
*/
include './BuildTreeNode.php';    
class Solution {

    /**
     * 236. Lowest Common Ancestor of a Binary Tree
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    public function lowestCommonAncestor($root, $p, $q) {
        if ($root === null || $root->val == $p->val || $root->val == $q->val) {
            return $root;
        }

        $left = $this->lowestCommonAncestor($root->left, $p, $q);
        $right = $this->lowestCommonAncestor($root->right, $p, $q);

        // If both left and right are non-null, root is LCA
        if ($left !== null && $right !== null) {
            return $root;
        }

        // Otherwise, return non-null side (either left or right)
        return $left !== null ? $left : $right;        
    }
}

$c = new Solution;
$root = buildTree([3,5,1,6,2,0,8,null,null,7,4]);
$p = buildTree([5, null, null]);
$q = buildTree([1, null, null]); // Expect 3

//$root = buildTree([3,5,1,6,2,0,8,null,null,7,4]);
//$p = buildTree([5, null, null]);
//$q = buildTree([4, null, null]); // Expect 5

//$root = buildTree([1,2]);
//$p = buildTree([1, null, null]);
//$q = buildTree([2, null, null]); // Expect 1


print_r($c->lowestCommonAncestor($root, $p, $q));
?>