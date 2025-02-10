<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */    
class Solution {

    /**
     * 2112. Path Sum
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum) {
        if (is_null($root)) { return false; }
        $targetSum -= $root->val;
        
        if (is_null($root->left) && is_null($root->right)) {
            return ($targetSum == 0);
        }
        return $this->hasPathSum($root->left, $targetSum) || $this->hasPathSum($root->right, $targetSum);
    }
}


$c = new Solution;
print_r($c->hasPathSum([5,4,8,11,null,13,4,7,2,null,null,null,1], 22)); // true
//print_r($c->hasPathSum([1,2,3], 5)); // False
//print_r($c->hasPathSum([], 0)); // False
?>