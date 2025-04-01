<?php
/*
Given a root node reference of a BST and a key, delete the node with the given key in the BST. 
    Return the root node reference (possibly updated) of the BST.
Basically, the deletion can be divided into two stages:
Search for a node to remove.
If the node is found, delete the node.
*/
include('./BuildTreeNode.php');
class Solution {

    /**
     * 450. Delete Node in a BST
     * @param TreeNode $root
     * @param Integer $key
     * @return TreeNode
     */
    function deleteNode(?TreeNode $root, $key): ?TreeNode {
        if ($root === null) { return null; }
        if ($key < $root->val) {
            $root->left = $this->deleteNode($root->left, $key);
        } 
        elseif ($key > $root->val) {
            $root->right = $this->deleteNode($root->right, $key);
        } 
        else {            
            // Case 1: No child or only right child.
            if ($root->left === null) {
                return $root->right;
            }
            // Case 2: Only left child.
            else if ($root->right === null) {
                return $root->left;
            }
            
            // Case 3: Two children.
            // Find the in-order successor (smallest in the right subtree).
            $minNode = $this->getMin($root->right);
            // Replace current node's value with the successor's value.
            $root->val = $minNode->val;
            $root->right = $this->deleteNode($root->right, $minNode->val);
        }
        return $root;
    }
    
    private function getMin(?TreeNode $node): ?TreeNode  {
        while ($node->left !== null) {
            $node = $node->left;
        }
        return $node;
    }    
}
$root1 = buildTree([5,3,6,2,4,null,7]);
$root2 = buildTree([5,3,6,2,4,null,7]);
$root3 = buildTree([]);
$c = new Solution;
printTree($c->deleteNode($root1, 3)); // Expect [5,4,6,2,null,null,7]
printTree($c->deleteNode($root2, 0)); // Expect [5,3,6,2,4,null,7]
printTree($c->deleteNode($root3, 0)); // Expect []
?>