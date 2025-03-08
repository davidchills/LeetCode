<?php
/*
Given a binary tree root, a node X in the tree is named good if in the path from root to X there are no nodes with a value greater than X.
Return the number of good nodes in the binary tree.
*/
include './BuildTreeNode.php';    
class Solution {

    /**
     * 1448. Count Good Nodes in Binary Tree
     * @param TreeNode $root
     * @return Integer
     */
    public function goodNodes(TreeNode $root): int {
        return $this->dfs($root, PHP_INT_MIN);
    }
    
    private function dfs(?TreeNode $node, int $currentMax): int {
        if ($node === null) { return 0; }
        $good = $node->val >= $currentMax ? 1 : 0;
        $currentMax = max($currentMax, $node->val);
        return $good + $this->dfs($node->left, $currentMax) + $this->dfs($node->right, $currentMax);
    }
    
}
//$root = buildTree([3,1,4,3,null,1,5]); // Expect 4
//$root = buildTree([3,3,null,4,2]); // Expect 3
$root = buildTree([1]); // Expect 1
$c = new Solution;
print_r($c->goodNodes($root));
?>