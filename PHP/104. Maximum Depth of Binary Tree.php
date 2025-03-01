<?php
/*
Given the root of a binary tree, return its maximum depth.
A binary tree's maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.
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
     * 104. Maximum Depth of Binary Tree
    * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if ($root === null) { return 0; }
        $queue = [$root];
        $depth = 0;
        while (!empty($queue)) {
            $levelSize = count($queue);
            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue);
                if ($node->left !== null) { $queue[] = $node->left; }
                if ($node->right !== null) { $queue[] = $node->right; }
            }
            $depth++;
        }
        return $depth;
    }
}

$c = new Solution;
$root = new TreeNode(3, 
    new TreeNode(9, null, null),
    new TreeNode(20, 
        new TreeNode(15, null, null),
        new TreeNode(7, null, null)
    )
); // Expect [[3],[9,20],[15,7]]
print_r($c->maxDepth($root));
?>