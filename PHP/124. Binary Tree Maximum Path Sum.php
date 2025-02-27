<?php
/*
A path in a binary tree is a sequence of nodes where each pair of adjacent nodes in the sequence has an edge connecting them. 
A node can only appear in the sequence at most once. Note that the path does not need to pass through the root.
The path sum of a path is the sum of the node's values in the path.
Given the root of a binary tree, return the maximum path sum of any non-empty path.
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
function printTree($root) {
    if ($root === null) { return; }
    echo $root->val . " ";
    printTree($root->left);
    printTree($root->right);
}     
class Solution {

    /**
     * 124. Binary Tree Maximum Path Sum
     * @param TreeNode $root
     * @return Integer
     */
    public function maxPathSum(?TreeNode $root): int {
        $maxSum = PHP_INT_MIN;
        
        $this->findMaxPath($root, $maxSum);
        
        return $maxSum;        
    }
    
    private function findMaxPath(?TreeNode $node, int &$maxSum): int {
        if ($node === null) { return 0; }

        $leftMax = max($this->findMaxPath($node->left, $maxSum), 0);
        $rightMax = max($this->findMaxPath($node->right, $maxSum), 0);

        $currentPathSum = $node->val + $leftMax + $rightMax;

        $maxSum = max($maxSum, $currentPathSum);

        return $node->val + max($leftMax, $rightMax);
    }    
}

$c = new Solution;
$root = new TreeNode(1, new TreeNode(2, null, null), new TreeNode(3, null, null)); // Expect 6
/*
$root = new TreeNode(-10, 
    new TreeNode(9, null, null), 
    new TreeNode(20, 
        new TreeNode(15, null, null), 
        new TreeNode(7, null, null)
    )
); // Expect 42
*/

print_r($c->maxPathSum($root));
?>