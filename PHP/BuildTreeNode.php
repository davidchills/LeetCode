<?php
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
	
function buildTree($arr) {
	$n = count($arr);
	if (empty($arr) || $arr[0] === null) { return null; }
	$root = new TreeNode($arr[0]);
	$queue = [$root];
	$i = 1;
	while ($i < $n) {
		$node = array_shift($queue);
		
		if ($i < $n && $arr[$i] !== null) {
			$node->left = new TreeNode($arr[$i]);
			$queue[] = $node->left;
		}
		$i++;
		
		if ($i < $n && $arr[$i] !== null) {
			$node->right = new TreeNode($arr[$i]);
			$queue[] = $node->right;
		}
		$i++;

	}
	return $root;
}	
	
//$arr = [1,2,3,null,5,null,4];
//$root = buildTree($arr);
//print_r($root);
// include('./BuildTreeNode.php');
?>