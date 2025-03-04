<?php
/*
Given the root of a binary tree, imagine yourself standing on the right side of it, 
    return the values of the nodes you can see ordered from top to bottom.
*/
include './BuildTreeNode.php';
/*
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
*/
class Solution {

    /**
     * 199. Binary Tree Right Side View
     * @param TreeNode $root
     * @return Integer[]
     */
    function rightSideView($root) {
        if ($root === null) { return []; }
        $result = [];
        $queue = [$root];
    
        while (!empty($queue)) {
            $size = count($queue);
            for ($i = 0; $i < $size; $i++) {
                $node = array_shift($queue);
    
                // The last node processed at each level is the rightmost one
                if ($i == $size - 1) {
                    $result[] = $node->val;
                }
    
                if ($node->left !== null) { $queue[] = $node->left; }
                if ($node->right !== null) { $queue[] = $node->right; }
            }
        }
    
        return $result;
    }
}

$c = new Solution;
//$root = buildTree([1,2,3,null,5,null,4]); // Expect [1,3,4]
//$root = buildTree([1,2,3,4,null,null,null,5]); // Expect [1,3,4,5]
//$root = buildTree([1,null,3]); // Expect [1,3]
$root = buildTree([]); // Expect []
print_r($c->rightSideView($root));
?>