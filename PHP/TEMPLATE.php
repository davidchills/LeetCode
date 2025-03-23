<?php
/*
You are in a city that consists of n intersections numbered from 0 to n - 1 with bi-directional roads between some intersections. 
    The inputs are generated such that you can reach any intersection from 
    any other intersection and that there is at most one road between any two intersections.
You are given an integer n and a 2D integer array roads where roads[i] = [ui, vi, timei] means that there is a road between 
    intersections ui and vi that takes timei minutes to travel. 
    You want to know in how many ways you can travel from intersection 0 to intersection n - 1 in the shortest amount of time.
Return the number of ways you can arrive at your destination in the shortest amount of time. 
    Since the answer may be large, return it modulo 109 + 7.
*/
class Solution {

    /**
     * 1976. Number of Ways to Arrive at Destination
     * @param Integer $n
     * @param Integer[][] $roads
     * @return Integer
     */
    function countPaths($n, $roads) {
        $MOD = 1e9 + 7;

        $adj = array_fill(0, $n, []);
        foreach ($roads as [$u, $v, $t]) {
            $adj[$u][] = [$v, $t];
            $adj[$v][] = [$u, $t];
        }

        $dist = array_fill(0, $n, INF);
        $ways = array_fill(0, $n, 0);
        $dist[0] = 0;
        $ways[0] = 1;

        $pq = new SplPriorityQueue();
        $pq->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        $pq->insert(0, 0);

        while (!$pq->isEmpty()) {
            $curr = $pq->extract();
            $u = $curr['data'];
            $d = -$curr['priority'];

            if ($d > $dist[$u]) { continue; }

            foreach ($adj[$u] as [$v, $time]) {
                $newDist = $d + $time;

                if ($newDist < $dist[$v]) {
                    $dist[$v] = $newDist;
                    $ways[$v] = $ways[$u];
                    $pq->insert($v, -$newDist);
                } 
                elseif ($newDist === $dist[$v]) {
                    $ways[$v] = ($ways[$v] + $ways[$u]) % $MOD;
                }
            }
        }

        return (int)$ways[$n - 1];        
    }
}

$c = new Solution;
//print_r($c->countPaths(7, [[0,6,7],[0,1,2],[1,2,3],[1,3,3],[6,3,3],[3,5,1],[6,5,1],[2,5,1],[0,4,5],[4,6,2]])); // Expect 4
print_r($c->countPaths(2, [[1,0,10]])); // Expect 1

?>