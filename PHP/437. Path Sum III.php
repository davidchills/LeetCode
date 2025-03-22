<?php
/*
Given the root of a binary tree and an integer targetSum, return the number of paths where the sum of the values along the path equals targetSum.
The path does not need to start or end at the root or a leaf, but it must go downwards (i.e., traveling only from parent nodes to child nodes).
*/
include('./BuildTreeNode.php');    
class Solution {

    /**
     * 437. Path Sum III
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Integer
     */
    private $paths = 0;
    function pathSum(?TreeNode $root, int $targetSum): int {
        if ($root === null) { return 0; }
        $this->paths = 0;
        $this->countPathsFromNode($root, $targetSum);
        return $this->paths;
    }
    
    private function countPathsFromNode(?TreeNode $node, int $targetSum): void {
        if ($node === null) { return; }
        $this->dfs($node, 0, $targetSum);
        $this->countPathsFromNode($node->left, $targetSum);
        $this->countPathsFromNode($node->right, $targetSum);
    }

    private function dfs(?TreeNode $node, int $currentSum, int $targetSum): void {
        if ($node === null) { return; }
        $currentSum += $node->val;
        if ($currentSum === $targetSum) {
            $this->paths += 1;
        }
        $this->dfs($node->left, $currentSum, $targetSum);
        $this->dfs($node->right, $currentSum, $targetSum);
    }
}
$root = buildTree([10,5,-3,3,2,null,11,3,-2,null,1]);
$targetSum = 8; // Expect 3

$root2 = buildTree([5,4,8,11,null,13,4,7,2,null,null,5,1]);
$targetSum2 = 22; // Expect 3

$c = new Solution;
print $c->pathSum($root, $targetSum)."\n";
print $c->pathSum($root2, $targetSum2)."\n";
?>