<?php
/*
You are given the root of a binary tree containing digits from 0 to 9 only.
Each root-to-leaf path in the tree represents a number.
For example, the root-to-leaf path 1 -> 2 -> 3 represents the number 123.
Return the total sum of all root-to-leaf numbers. Test cases are generated so that the answer will fit in a 32-bit integer.
A leaf node is a node with no children.
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
class Solution {

    /**
     * 129. Sum Root to Leaf Numbers
     * @param TreeNode $root
     * @return Integer
     */
    function sumNumbers($root, $currentSum = 0) {
        //return $this->dfs($root, 0);
        if ($root === null) { return 0; }
        // I know the () aren't needed because PEDMAS, but I like them.
        // * 10 to shift the number one decimal to the left before adding.
        $currentSum = (($currentSum * 10) + $root->val);
        if ($root->left === null && $root->right === null) {
            return $currentSum;
        }
        $leftSum = $this->sumNumbers($root->left, $currentSum);
        $rightSum = $this->sumNumbers($root->right, $currentSum);
        return $leftSum + $rightSum;        
    }
    
    // I ended up doing this in the original method, but wanted to keep it.
    private function dfs(?TreeNode $node, int $currentSum): int {
        if ($node === null) { return 0; }
        // I know the () aren't needed because PEDMAS, but I like them.
        // * 10 to shift the number one decimal to the left before adding.
        $currentSum = (($currentSum * 10) + $node->val);
        if ($node->left === null && $node->right === null) {
            return $currentSum;
        }
        $leftSum = $this->dfs($node->left, $currentSum);
        $rightSum = $this->dfs($node->right, $currentSum);
        return $leftSum + $rightSum;
    }     
}

$c = new Solution;
//$root = new TreeNode(1, new TreeNode(2), new TreeNode(3)); // Expect 25

$root = new TreeNode(4, 
    new TreeNode(9,
        new TreeNode(5),
        new TreeNode(1)
    ), 
    new TreeNode(0)
); // Expect 1026

print_r($c->sumNumbers($root));
?>