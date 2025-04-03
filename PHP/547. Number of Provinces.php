<?php
/*
There are n cities. Some of them are connected, while some are not. 
    If city a is connected directly with city b, and 
    city b is connected directly with city c, 
    then city a is connected indirectly with city c.
A province is a group of directly or indirectly connected cities and no other cities outside of the group.
You are given an n x n matrix isConnected where isConnected[i][j] = 1 if the ith city and the jth city are directly connected, 
    and isConnected[i][j] = 0 otherwise.
Return the total number of provinces.
*/
class Solution {

    /**
     * 547. Number of Provinces
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected) {
        $n = count($isConnected);
        $visited = array_fill(0, $n, false);
        $count = 0;

        for ($i = 0; $i < $n; $i++) {
            if (!$visited[$i]) {
                $this->dfs($isConnected, $visited, $i);
                $count++;
            }
        }
        return $count;
    }

    private function dfs($matrix, &$visited, $city) {
        $visited[$city] = true;
        for ($j = 0; $j < count($matrix); $j++) {
            if ($matrix[$city][$j] === 1 && !$visited[$j]) {
                $this->dfs($matrix, $visited, $j);
            }
        }
    }
}

$c = new Solution;
print $c->findCircleNum([[1,1,0],[1,1,0],[0,0,1]])."\n"; // Expect 2
print $c->findCircleNum([[1,0,0],[0,1,0],[0,0,1]])."\n"; // Expect 3

?>