<?php
/*
Given a binary tree with the following rules:

root.val == 0
For any treeNode:
If treeNode.val has a value x and treeNode.left != null, then treeNode.left.val == 2 * x + 1
If treeNode.val has a value x and treeNode.right != null, then treeNode.right.val == 2 * x + 2
Now the binary tree is contaminated, which means all treeNode.val have been changed to -1.

Implement the FindElements class:

FindElements(TreeNode* root) Initializes the object with a contaminated binary tree and recovers it.
bool find(int target) Returns true if the target value exists in the recovered binary tree.
*/
/**
 * Definition for a binary tree node.
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

class FindElements {
    private $values = [];
    /**
     * @param TreeNode $root
     */
    function __construct(TreeNode $root) {
        if ($root !== null) {
            $this->recoverTree($root, 0);
        }        
    }
  
    /**
     * @param Integer $target
     * @return Boolean
     */
    function find(int $target): bool {
        return isset($this->values[$target]);
    }

    /**
     * @param TreeNode $node
     * @param Integer $val
     * @return Boolean
     */
    private function recoverTree($node, int $val): void {
        if ($node === null) return;

        $node->val = $val;
        $this->values[$val] = true;

        $this->recoverTree($node->left, 2 * $val + 1);
        $this->recoverTree($node->right, 2 * $val + 2);
    }    
}

// Helper function to create a contaminated tree (-1 values)
function createContaminatedTree($structure) {
    if (empty($structure)) { return null; }

    $nodes = [];
    foreach ($structure as $index => $value) {
        $nodes[$index] = new TreeNode(-1);
    }

    foreach ($structure as $index => $value) {
        if ($value !== null) {
            if (isset($structure[2 * $index + 1])) {
                $nodes[$index]->left = $nodes[2 * $index + 1];
            }
            if (isset($structure[2 * $index + 2])) {
                $nodes[$index]->right = $nodes[2 * $index + 2];
            }
        }
    }

    return $nodes[0] ?? null;
}
/*    
$root = createContaminatedTree([-1,null,-1]);  
$c = new FindElements($root);
echo "Find 1: " . ($c->find(1) ? "true" : "false") . "\n"; // Expected: false
echo "Find 2: " . ($c->find(2) ? "true" : "false") . "\n"; // Expected: true
*/
/*
$root = createContaminatedTree([-1,-1,-1,-1,-1]);  
$c = new FindElements($root);
echo "Find 1: " . ($c->find(1) ? "true" : "false") . "\n"; // Expected: true
echo "Find 3: " . ($c->find(3) ? "true" : "false") . "\n"; // Expected: true
echo "Find 5: " . ($c->find(5) ? "true" : "false") . "\n"; // Expected: false
*/

$root = createContaminatedTree([-1,null,-1,-1,null,-1]);  
$c = new FindElements($root);
echo "Find 2: " . ($c->find(2) ? "true" : "false") . "\n"; // Expected: true
echo "Find 3: " . ($c->find(3) ? "true" : "false") . "\n"; // Expected: false
echo "Find 4: " . ($c->find(4) ? "true" : "false") . "\n"; // Expected: false
echo "Find 5: " . ($c->find(5) ? "true" : "false") . "\n"; // Expected: true

?>