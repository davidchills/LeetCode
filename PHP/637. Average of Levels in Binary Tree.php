<?php
/*
Given the root of a binary tree, return the average value of the nodes on each level in the form of an array. 
    Answers within 10-5 of the actual answer will be accepted.
*/
include './BuildTreeNode.php';    
class Solution {

    /**
     * 637. Average of Levels in Binary Tree
     * @param TreeNode $root
     * @return Float[]
     */
    function averageOfLevels($root) {
        if ($root === null) { return []; }
        $result = [];
        $queue = [$root];
    
        while (!empty($queue)) {
            $levelSize = count($queue);
            $levelSum = 0;
            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue);
                $levelSum += $node->val;                
                if ($node->left !== null) { $queue[] = $node->left; }
                if ($node->right !== null) { $queue[] = $node->right; }                
            }

            $result[] = $levelSum / $levelSize;
        }
    
        return $result;     
    }
}

$c = new Solution;
//$root = buildTree([3,9,20,null,null,15,7]); // Expect [3.00000,14.50000,11.00000]
$root = buildTree([3,9,20,15,7]); // Expect [3.00000,14.50000,11.00000]
print_r($c->averageOfLevels($root));
?>