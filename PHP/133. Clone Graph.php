<?php
/*
Given a reference of a node in a connected undirected graph.
Return a deep copy (clone) of the graph.
Each node in the graph contains a value (int) and a list (List[Node]) of its neighbors.
*/
function printGraph($node) {
    if ($node === null) return "Graph is empty\n";

    $queue = [$node];
    $visited = [];

    while (!empty($queue)) {
        $curr = array_shift($queue);
        if (isset($visited[$curr->val])) continue;
        $visited[$curr->val] = true;

        $neighborVals = array_map(fn($n) => $n->val, $curr->neighbors);
        echo "Node {$curr->val} -> [" . implode(", ", $neighborVals) . "]\n";

        foreach ($curr->neighbors as $neighbor) {
            if (!isset($visited[$neighbor->val])) {
                $queue[] = $neighbor;
            }
        }
    }
}
    
class Node {
    public $val;
    public $neighbors;

    function __construct($val = 0, $neighbors = []) {
        $this->val = $val;
        $this->neighbors = $neighbors;
    }
}
    
class Solution {

    /**
     * 133. Clone Graph
     * @param Node $node
     * @return Node
     */
    public function cloneGraph(Node $node) {
        if ($node === null) { return null; }
        $visited = [];
        return $this->dfsClone($node, $visited);        
    }

    private function dfsClone(Node $node, array &$visited) {
        if (isset($visited[$node->val])) {
            return $visited[$node->val]; // Return already copied node
        }

        // Clone the current node
        $cloneNode = new Node($node->val);
        $visited[$node->val] = $cloneNode;

        // Recursively clone neighbors
        foreach ($node->neighbors as $neighbor) {
            $cloneNode->neighbors[] = $this->dfsClone($neighbor, $visited);
        }

        return $cloneNode;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);

$node1->neighbors = [$node2, $node4];
$node2->neighbors = [$node1, $node3];
$node3->neighbors = [$node2, $node4];
$node4->neighbors = [$node1, $node3];

$c = new Solution;
$clonedGraph = $c->cloneGraph($node1);
echo "Original Graph:\n";
printGraph($node1);
echo "\nCloned Graph:\n";
printGraph($clonedGraph);
?>