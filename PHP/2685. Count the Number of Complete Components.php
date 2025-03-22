<?php
/*
You are given an integer n. There is an undirected graph with n vertices, numbered from 0 to n - 1. 
    You are given a 2D integer array edges where edges[i] = [ai, bi] denotes that there exists an undirected edge connecting vertices ai and bi.
Return the number of complete connected components of the graph.
A connected component is a subgraph of a graph in which there exists a path between any two vertices, 
    and no vertex of the subgraph shares an edge with a vertex outside of the subgraph.
A connected component is said to be complete if there exists an edge between every pair of its vertices.
*/
class Solution {

    /**
     * 2685. Count the Number of Complete Components
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function countCompleteComponents($n, $edges) {
        $adj = array_fill(0, $n, []);
        foreach ($edges as [$u, $v]) {
            $adj[$u][] = $v;
            $adj[$v][] = $u;
        }

        $visited = array_fill(0, $n, false);
        $count = 0;

        for ($i = 0; $i < $n; $i++) {
            if ($visited[$i]) continue;

            $queue = [$i];
            $visited[$i] = true;
            $nodes = [$i];
            $edgesInComponent = 0;

            while (!empty($queue)) {
                $curr = array_shift($queue);
                foreach ($adj[$curr] as $neighbor) {
                    $edgesInComponent++;
                    if (!$visited[$neighbor]) {
                        $visited[$neighbor] = true;
                        $queue[] = $neighbor;
                        $nodes[] = $neighbor;
                    }
                }
            }

            $v = count($nodes);
            $expectedEdges = $v * ($v - 1);
            if ($edgesInComponent === $expectedEdges) {
                $count++;
            }
        }

        return $count;        
    }
}

$c = new Solution;
//print_r($c->countCompleteComponents(6, [[0,1],[0,2],[1,2],[3,4]])); // Expect 3
print_r($c->countCompleteComponents(6, [[0,1],[0,2],[1,2],[3,4],[3,5]])); // Expect 1

?>