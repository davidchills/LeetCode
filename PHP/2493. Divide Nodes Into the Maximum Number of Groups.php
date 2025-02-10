<?php
class Solution {

    /**
     * 2493. Divide Nodes Into the Maximum Number of Groups
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    public function magnificentSets($n, $edges) {
        $graph = array_fill(1, $n, []);

        // Step 1: Build the adjacency list
        foreach ($edges as [$u, $v]) {
            $graph[$u][] = $v;
            $graph[$v][] = $u;
        }

        // Step 2: Check if the graph is bipartite using BFS
        $color = array_fill(1, $n, -1);
        $components = [];

        for ($i = 1; $i <= $n; $i++) {
            if ($color[$i] !== -1) continue;

            $queue = [$i];
            $color[$i] = 0;
            $component = [];
            $index = 0;

            while ($index < count($queue)) {
                $node = $queue[$index++];
                $component[] = $node;

                foreach ($graph[$node] as $neighbor) {
                    if ($color[$neighbor] === -1) {
                        $color[$neighbor] = 1 - $color[$node];
                        $queue[] = $neighbor;
                    } elseif ($color[$neighbor] === $color[$node]) {
                        return -1; // Graph is not bipartite
                    }
                }
            }
            $components[] = $component;
        }

        // Step 3: Compute the sum of max depths for each component
        $totalGroups = 0;
        foreach ($components as $component) {
            $totalGroups += $this->maxBFSDepth($graph, $component);
        }

        return $totalGroups;
    }

    /**
     * Helper function to find the maximum BFS depth in a component
     * @param array $graph
     * @param array $nodes
     * @return int
     */
    private function maxBFSDepth($graph, $nodes) {
        $maxDepth = 0;

        foreach ($nodes as $start) {
            $visited = array_fill(1, count($graph), false);
            $queue = [[$start, 1]]; // [node, depth]
            $visited[$start] = true;
            $localMax = 1;

            while (!empty($queue)) {
                [$node, $depth] = array_shift($queue);
                $localMax = max($localMax, $depth);

                foreach ($graph[$node] as $neighbor) {
                    if (!$visited[$neighbor]) {
                        $visited[$neighbor] = true;
                        $queue[] = [$neighbor, $depth + 1];
                    }
                }
            }

            $maxDepth = max($maxDepth, $localMax);
        }

        return $maxDepth;
    }
}

$c = new Solution;
//print_r($c->magnificentSets(6, [[1,2],[1,4],[1,5],[2,6],[2,3],[4,6]])); // Expect 4
//print_r($c->magnificentSets(3, [[1,2],[2,3],[3,1]])); // Expect -1
print_r($c->magnificentSets(92, [[67,29],[13,29],[77,29],[36,29],[82,29],[54,29],[57,29],[53,29],[68,29],[26,29],[21,29],[46,29],[41,29],[45,29],[56,29],[88,29],[2,29],[7,29],[5,29],[16,29],[37,29],[50,29],[79,29],[91,29],[48,29],[87,29],[25,29],[80,29],[71,29],[9,29],[78,29],[33,29],[4,29],[44,29],[72,29],[65,29],[61,29]])); // Expect 57
?>