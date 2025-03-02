<?php
/*
Given the root of a complete binary tree, return the number of the nodes in the tree.
According to Wikipedia, every level, except possibly the last, is completely filled in a complete binary tree, 
    and all nodes in the last level are as far left as possible. It can have between 1 and 2h nodes inclusive at the last level h.
Design an algorithm that runs in less than O(n) time complexity.
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
     * 222. Count Complete Tree Nodes
     * @param TreeNode $root
     * @return Integer
     */
    public function countNodes(?TreeNode $root): int {
        if ($root === null) { return 0; }
        $leftDepth = $this->getDepth($root->left);
        $rightDepth = $this->getDepth($root->right);

        if ($leftDepth === $rightDepth) {
            return (1 << $leftDepth) + $this->countNodes($root->right);
        } 
        else {
            return (1 << $rightDepth) + $this->countNodes($root->left);
        }        
    }
    private function getDepth(?TreeNode $node): int {
        $depth = 0;
        while ($node !== null) {
            $node = $node->left;
            $depth++;
        }
        return $depth;
    }    
}

$c = new Solution;
$root = new TreeNode(1, 
    new TreeNode(2, 
        new TreeNode(4, null, null),
        new TreeNode(5, null, null)
    ),
    new TreeNode(3, 
        new TreeNode(6, null, null), 
        null
    )
); // Expect [[3],[9,20],[15,7]]
//$root = new TreeNode(1, null, null); // Expect 1
print_r($c->countNodes($root));
?>