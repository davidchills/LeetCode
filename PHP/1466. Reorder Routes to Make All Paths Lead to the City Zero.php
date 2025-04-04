<?php
/*
There are n cities numbered from 0 to n - 1 and n - 1 roads such that there is only one way to travel between two different cities (this network form a tree). Last year, 
    The ministry of transport decided to orient the roads in one direction because they are too narrow.
Roads are represented by connections where connections[i] = [ai, bi] represents a road from city ai to city bi.
This year, there will be a big event in the capital (city 0), and many people want to travel to this city.
Your task consists of reorienting some roads such that each city can visit the city 0. Return the minimum number of edges changed.
It's guaranteed that each city can reach city 0 after reorder.
*/
class Solution {

    /**
     * 1466. Reorder Routes to Make All Paths Lead to the City Zero
     * @param Integer $n
     * @param Integer[][] $connections
     * @return Integer
     */
    function minReorder($n, $connections) {
        $graph = array_fill(0, $n, []);
        $reverseSet = [];
        foreach ($connections as [$from, $to]) {
            $graph[$from][] = $to;
            $graph[$to][] = $from;
            $reverseSet["$from-$to"] = true;
        }
        $visited = array_fill(0, $n, false);
        $count = 0;
        $this->dfs(0, $graph, $reverseSet, $visited, $count);
        return $count;
    }

    function dfs($node, &$graph, &$reverseSet, &$visited, &$count) {
        $visited[$node] = true;
        foreach ($graph[$node] as $neighbor) {
            if (!$visited[$neighbor]) {
                if (isset($reverseSet["$node-$neighbor"])) {
                    $count++;
                }
                $this->dfs($neighbor, $graph, $reverseSet, $visited, $count);
            }
        }
    }
}

$c = new Solution;
print $c->minReorder(6, [[0,1],[1,3],[2,3],[4,0],[4,5]])."\n"; // Expect 3
print $c->minReorder(5, [[1,0],[1,2],[3,2],[3,4]])."\n"; // Expect 2
print $c->minReorder(3, [[1,0],[2,0]])."\n"; // Expect 0

?>