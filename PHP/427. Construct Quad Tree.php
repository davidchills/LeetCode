<?php
/*
Given a n * n matrix grid of 0's and 1's only. We want to represent grid with a Quad-Tree.
Return the root of the Quad-Tree representing grid.
A Quad-Tree is a tree data structure in which each internal node has exactly four children. Besides, each node has two attributes:
val: True if the node represents a grid of 1's or False if the node represents a grid of 0's. 
    Notice that you can assign the val to True or False when isLeaf is False, and both are accepted in the answer.
isLeaf: True if the node is a leaf node on the tree or False if the node has four children.
class Node {
    public boolean val;
    public boolean isLeaf;
    public Node topLeft;
    public Node topRight;
    public Node bottomLeft;
    public Node bottomRight;
}
We can construct a Quad-Tree from a two-dimensional area using the following steps:
If the current grid has the same value (i.e all 1's or all 0's) 
    set isLeaf True and set val to the value of the grid and set the four children to Null and stop.
If the current grid has different values, 
    set isLeaf to False and set val to any value and divide the current grid into four sub-grids as shown in the photo.
Recurse for each of the children with the proper sub-grid.
*/
class Node {
    public $val = null;
    public $isLeaf = null;
    public $topLeft = null;
    public $topRight = null;
    public $bottomLeft = null;
    public $bottomRight = null;
    function __construct($val, $isLeaf) {
        $this->val = $val;
        $this->isLeaf = $isLeaf;
        $this->topLeft = null;
        $this->topRight = null;
        $this->bottomLeft = null;
        $this->bottomRight = null;
    }
}    

function serializeQuadTreeLeetcodeStyle($root) {
    $result = [];
    $queue = [$root];

    while (!empty($queue)) {
        $node = array_shift($queue);

        if ($node === null) {
            $result[] = null;
            continue;
        }

        // Add the current node in [val, isLeaf] format
        $result[] = [$node->val ? 1 : 0, $node->isLeaf ? 1 : 0];

        // Always enqueue 4 children, even for leaf nodes (placeholders)
        array_push($queue,
            $node->topLeft,
            $node->topRight,
            $node->bottomLeft,
            $node->bottomRight
        );
    }

    // Trim trailing nulls to match Leetcode output
    while (!empty($result) && end($result) === null) {
        array_pop($result);
    }

    return $result;
}
    
class Solution {
    /**
     * @param Integer[][] $grid
     * @return Node
     */
    function construct($grid) {
        return $this->constructQuadTree($grid, 0, 0, count($grid));
    }

    private function constructQuadTree($grid, $rowStart, $colStart, $size) {
        // Base case: if the grid is 1x1, create a leaf node
        if ($size == 1) {
            return new Node($grid[$rowStart][$colStart] == 1, true);
        }

        // Check if all values in the current subgrid are the same
        $sameValue = true;
        $value = $grid[$rowStart][$colStart];

        for ($i = $rowStart; $i < $rowStart + $size; $i++) {
            for ($j = $colStart; $j < $colStart + $size; $j++) {
                if ($grid[$i][$j] != $value) {
                    $sameValue = false;
                    break 2;
                }
            }
        }

        // If all values are the same, create a leaf node
        if ($sameValue) {
            return new Node($value == 1, true);
        }

        // Otherwise, divide the grid into four subgrids
        $mid = $size / 2;
        $topLeft = $this->constructQuadTree($grid, $rowStart, $colStart, $mid);
        $topRight = $this->constructQuadTree($grid, $rowStart, $colStart + $mid, $mid);
        $bottomLeft = $this->constructQuadTree($grid, $rowStart + $mid, $colStart, $mid);
        $bottomRight = $this->constructQuadTree($grid, $rowStart + $mid, $colStart + $mid, $mid);

        // Create the non-leaf node
        $node = new Node(true, false);
        $node->topLeft = $topLeft;
        $node->topRight = $topRight;
        $node->bottomLeft = $bottomLeft;
        $node->bottomRight = $bottomRight;

        return $node;
    }
}
    
$grid1 = [[0,1],[1,0]];
$grid2 = [[1,1,1,1,0,0,0,0],[1,1,1,1,0,0,0,0],[1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1],[1,1,1,1,0,0,0,0],[1,1,1,1,0,0,0,0],[1,1,1,1,0,0,0,0],[1,1,1,1,0,0,0,0]];

$c = new Solution;
$root1 = $c->construct($grid1); 
$root2 = $c->construct($grid2);

print json_encode(serializeQuadTreeLeetcodeStyle($root1))."\n"; // Expect  [[0,1],[1,0],[1,1],[1,1],[1,0]]
echo "\n\n";
print json_encode(serializeQuadTreeLeetcodeStyle($root2))."\n"; // Expect [[0,1],[1,1],[0,1],[1,1],[1,0],null,null,null,null,[1,0],[1,0],[1,1],[1,1]]
?>