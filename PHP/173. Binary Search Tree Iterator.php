<?php
/*
Implement the BSTIterator class that represents an iterator over the in-order traversal of a binary search tree (BST):
• BSTIterator(TreeNode root) Initializes an object of the BSTIterator class. 
    The root of the BST is given as part of the constructor. 
    The pointer should be initialized to a non-existent number smaller than any element in the BST.
• boolean hasNext() Returns true if there exists a number in the traversal to the right of the pointer, otherwise returns false.
• int next() Moves the pointer to the right, then returns the number at the pointer.
Notice that by initializing the pointer to a non-existent smallest number, the first call to next() will return the smallest element in the BST.
You may assume that next() calls will always be valid. That is, there will be at least a next number in the in-order traversal when next() is called.
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
class BSTIterator {

    /**
     * 173. Binary Search Tree Iterator
     * @param TreeNode $root
     */
    private $stack = [];
    public function __construct(?TreeNode $root) {
        $this->pushLeft($root);
    }
    
    /**
     * @return Integer
     */
    public function next(): int {
        $node = array_pop($this->stack);
        $this->pushLeft($node->right);
        return $node->val;
    }
    
    /**
     * @return Boolean
     */
    public function hasNext(): bool {
        return !empty($this->stack);
    } 
    
    private function pushLeft(?TreeNode $node) {
        while ($node !== null) {
            $this->stack[] = $node;
            $node = $node->left;
        }
    }    
}
$root = new TreeNode(7, 
    new TreeNode(3, null, null),
    new TreeNode(15,
        new TreeNode(9, null, null),
        new TreeNode(20, null, null)
    )
);
$c = new BSTIterator($root);
print $c->next()."\n"; // Expect 3
print $c->next()."\n"; // Expect 7
print $c->hasNext()."\n"; // Expect true
print $c->next()."\n"; // Expect 9
print $c->hasNext()."\n"; // Expect true
print $c->next()."\n"; // Expect 15
print $c->hasNext()."\n"; // Expect true
print $c->next()."\n"; // Expect 20
print $c->hasNext()."\n"; // Expect false
?>