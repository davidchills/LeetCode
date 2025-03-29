<?php
/*
You are given the root of a binary tree.
A ZigZag path for a binary tree is defined as follow:
Choose any node in the binary tree and a direction (right or left).
If the current direction is right, move to the right child of the current node; otherwise, move to the left child.
Change the direction from right to left or from left to right.
Repeat the second and third steps until you can't move in the tree.
Zigzag length is defined as the number of nodes visited - 1. (A single node has a length of 0).
Return the longest ZigZag path contained in that tree.
*/
include('./BuildTreeNode.php');
class Solution {

    /**
     * 1372. Longest ZigZag Path in a Binary Tree
     * @param TreeNode $root
     * @return Integer
     */
    private $maxLength = 0;
    
    function longestZigZag($root) {
        $this->dfs($root, true, 0);
        $this->dfs($root, false, 0);
        return $this->maxLength;
    }

    private function dfs($node, $isLeft, $length) {
        if ($node === null) { return; }
        $this->maxLength = max($this->maxLength, $length);
        if ($isLeft) {
            $this->dfs($node->left, false, $length + 1);
            $this->dfs($node->right, true, 1);
        } 
        else {
            $this->dfs($node->right, true, $length + 1);
            $this->dfs($node->left, false, 1);
        }
    }
}

//$root = buildTree([1,null,1,1,1,null,null,1,1,null,1,null,null,null,1]); // Expect 3
$root = buildTree([1,1,1,null,1,null,null,1,1,null,1]); // Expect 4
//$root = buildTree([1]); // Expect 0
$c = new Solution;
print_r($c->longestZigZag($root)); 

?>