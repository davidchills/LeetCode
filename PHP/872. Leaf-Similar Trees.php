<?php
/*
Consider all the leaves of a binary tree, from left to right order, the values of those leaves form a leaf value sequence.
*/
include('./BuildTreeNode.php');
class Solution {

    /**
     * 872. Leaf-Similar Trees
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function leafSimilar(TreeNode $root1, TreeNode $root2): bool {
        return $this->getLeafSequence($root1) === $this->getLeafSequence($root2);
    }
    

    /**
     * @param TreeNode $node
     * @return array
     */
    private function getLeafSequence(TreeNode $node): array {
        $leaves = [];
        $this->dfs($node, $leaves);
        return $leaves;
    }

    /**
     * @param TreeNode $node
     * @param array &$leaves
     */
    private function dfs(?TreeNode $node, array &$leaves): void {
        if ($node === null) return;

        if ($node->left === null && $node->right === null) {
            $leaves[] = $node->val;
        }

        $this->dfs($node->left, $leaves);
        $this->dfs($node->right, $leaves);
    }    
}
//$root1 = buildTree([3,5,1,6,2,9,8,null,null,7,4]);
//$root2 = buildTree([3,5,1,6,7,4,2,null,null,null,null,null,null,9,8]); // Expect true
$root1 = buildTree([1,2,3]);
$root2 = buildTree([1,3,2]); // Expect false
$c = new Solution;
print_r($c->leafSimilar($root1, $root2));

?>