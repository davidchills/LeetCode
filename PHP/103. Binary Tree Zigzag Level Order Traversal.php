<?php
/*
Given the root of a binary tree, return the zigzag level order traversal of its nodes' values. 
    (i.e., from left to right, then right to left for the next level and alternate between).
*/
include './BuildTreeNode.php';    
class Solution {

    /**
     * 103. Binary Tree Zigzag Level Order Traversal
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root) {    
        if ($root === null) { return []; }
        $result = [];
        $queue = [$root];
        $zigzag = false;
    
        while (!empty($queue)) {
            $levelSize = count($queue);
            $levelNodes = [];
            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue);
                $levelNodes[] = $node->val;                
                if ($node->left !== null) { $queue[] = $node->left; }
                if ($node->right !== null) { $queue[] = $node->right; }                
            }
            if ($zigzag) {
                $levelNodes = array_reverse($levelNodes);
            }
            $result[] = $levelNodes;
            $zigzag = !$zigzag;
        }
    
        return $result;     
    }
}

$c = new Solution;
//$root = buildTree([3,9,20,null,null,15,7]); // Expect [[3],[20,9],[15,7]]
//$root = buildTree([1]); // Expect [[1]]
$root = buildTree([]); // Expect []
print_r($c->zigzagLevelOrder($root));
?>