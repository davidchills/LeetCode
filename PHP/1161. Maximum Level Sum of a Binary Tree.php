<?php
/*
Given the root of a binary tree, the level of its root is 1, the level of its children is 2, and so on.
Return the smallest level x such that the sum of all the values of nodes at level x is maximal.
*/
include('./BuildTreeNode.php');
class Solution {
    /**
     * 1161. Maximum Level Sum of a Binary Tree
     * @param TreeNode $root
     * @return Integer
     */
    function maxLevelSum($root) {
        if ($root === null) { return 0; }
        $queue = [$root];
        $level = 1;
        $maxSum = $root->val;
        $maxLevel = 1;
        while (!empty($queue)) {
            $levelSize = count($queue);
            $sum = 0;
            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue);
                $sum += $node->val;
                if ($node->left !== null) {
                    $queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $queue[] = $node->right;
                }
            }
            if ($sum > $maxSum) {
                $maxSum = $sum;
                $maxLevel = $level;
            }
            $level++;
        }
        return $maxLevel;
    }   
}
$root1 = buildTree([1,7,0,7,-8,null,null]); // Expect 2
$root2 = buildTree([989,null,10250,98693,-89388,null,null,null,-32127]); // Expect 2
$root3 = buildTree([-100,-200,-300,-20,-5,-10,null]); // Expect 3
$c = new Solution;
print $c->maxLevelSum($root1)."\n";
print $c->maxLevelSum($root2)."\n";
print $c->maxLevelSum($root3)."\n";
?>