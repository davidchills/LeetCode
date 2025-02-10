<?php
class Solution {

    /**
     * 1462. Course Schedule IV
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @param Integer[][] $queries
     * @return Boolean[]
     */
    function checkIfPrerequisite($numCourses, $prerequisites, $queries) {
        // Step 1: Initialize a graph with false values
        $isPrerequisite = array_fill(0, $numCourses, array_fill(0, $numCourses, false));

        // Step 2: Set direct prerequisites
        foreach ($prerequisites as [$a, $b]) {
            $isPrerequisite[$a][$b] = true;
        }

        // Step 3: Floyd-Warshall Algorithm to compute transitive closure
        for ($k = 0; $k < $numCourses; $k++) {
            for ($i = 0; $i < $numCourses; $i++) {
                for ($j = 0; $j < $numCourses; $j++) {
                    if ($isPrerequisite[$i][$k] && $isPrerequisite[$k][$j]) {
                        $isPrerequisite[$i][$j] = true;
                    }
                }
            }
        }

        // Step 4: Answer the queries
        $result = [];
        foreach ($queries as [$u, $v]) {
            $result[] = $isPrerequisite[$u][$v];
        }

        return $result;        
    }
}

$c = new Solution;
//print_r($c->checkIfPrerequisite(2, [[1,0]], [[0,1],[1,0]])); // Expected [false,true]
//print_r($c->checkIfPrerequisite(2, [], [[1,1],[0,1]])); // Expected [false,false]
print_r($c->checkIfPrerequisite(3, [[1,2],[1,0],[2,0]], [[1,0],[1,2]])); // Expected [true,true]
?>