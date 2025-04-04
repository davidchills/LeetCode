<?php
/*
Given the root of a binary tree, return the lowest common ancestor of its deepest leaves.
Recall that:
The node of a binary tree is a leaf if and only if it has no children
The depth of the root of the tree is 0. if the depth of a node is d, the depth of each of its children is d + 1.
The lowest common ancestor of a set S of nodes, is the node A with the largest depth such that every node in S is in the subtree with root A.
*/
include('./BuildTreeNode.php');    
class Solution {

    /**
     * 1123. Lowest Common Ancestor of Deepest Leaves
     * @param TreeNode $root
     * @return TreeNode
     */
    function lcaDeepestLeaves($root) {
        return $this->dfs($root)[1];
    }
    
    private function dfs($node) {
        if ($node === null) return [0, null];

        [$leftDepth, $leftNode] = $this->dfs($node->left);
        [$rightDepth, $rightNode] = $this->dfs($node->right);

        if ($leftDepth === $rightDepth) {
            return [$leftDepth + 1, $node];
        } 
        elseif ($leftDepth > $rightDepth) {
            return [$leftDepth + 1, $leftNode];
        } 
        else {
            return [$rightDepth + 1, $rightNode];
        }
    }    
}

$c = new Solution;
$root1 = buildTree([3,5,1,6,2,0,8,null,null,7,4]); // Expect [2,7,4]
$root2 = buildTree([1]); // Expect [1]
$root3 = buildTree([0,1,3,null,2]);  // Expect [2]

printTree($c->lcaDeepestLeaves($root1)); // Expect [2,7,4]
printTree($c->lcaDeepestLeaves($root2)); // Expect [1]
printTree($c->lcaDeepestLeaves($root3)); // Expect [2]

?>