<?php
/*
Given the root of a binary tree, return the level order traversal of its nodes' values. (i.e., from left to right, level by level).
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
     * 102. Binary Tree Level Order Traversal
     * @param TreeNode $root
     * @return Integer[][]
     */    
    public function levelOrder($root) {
        if ($root === null) { return []; }
        $queue = [$root];
        $result = [];
        
        while (!empty($queue)) {
            $levelSize = count($queue);
            $level = [];

            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue);
                $level[] = $node->val;

                if ($node->left !== null) { $queue[] = $node->left; }
                if ($node->right !== null) { $queue[] = $node->right; }
            }
            $result[] = $level;
        }

        return $result;        
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
   
//$root = new TreeNode(1, null, null); // [[1]]
//$root = new TreeNode(null, null, null); // []    
print_r($c->levelOrder($root));
?>