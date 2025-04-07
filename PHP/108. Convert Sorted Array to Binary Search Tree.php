<?php
/*
Given an integer array nums where the elements are sorted in ascending order, convert it to a height-balanced binary search tree.
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
function printTree(?TreeNode $root) {
	if ($root === null) {
		print "Empty Tree\n";
		return;
	}
	$queue = [$root];
	$levelValues = [];
	while (count($queue) > 0) {
		$levelSize = count($queue);
		for ($i = 0; $i < $levelSize; $i++) {
			$node = array_shift($queue);
			$levelValues[] = $node ? $node->val : null;
            if ($node !== null) {
                $queue[] = $node->left ?? null;
                $queue[] = $node->right ?? null;
            }
		}
	}
    while (end($levelValues) === null) { array_pop($levelValues); }
	print "[".implode(", ", array_values($levelValues))."]\n";
}   
class Solution {

    /**
     * 108. Convert Sorted Array to Binary Search Tree
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums) {
        return $this->build($nums, 0, count($nums) - 1);
    }
    
    private function build($nums, $left, $right) {
        if ($left > $right) { return null; }

        $mid = intdiv(($left + $right), 2);
        $node = new TreeNode($nums[$mid]);
        $node->left = $this->build($nums, $left, $mid - 1);
        $node->right = $this->build($nums, $mid + 1, $right);
        return $node;
    }    
}

$c = new Solution;
printTree($c->sortedArrayToBST([-10,-3,0,5,9])); // [0,-3,9,-10,null,5]
printTree($c->sortedArrayToBST([1,3])); // Expect [3,1]


?>