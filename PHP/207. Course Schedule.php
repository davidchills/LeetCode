<?php
/*
There are a total of numCourses courses you have to take, labeled from 0 to numCourses - 1. 
    You are given an array prerequisites where prerequisites[i] = [ai, bi] indicates that you must take course bi first if you want to take course ai.
For example, the pair [0, 1], indicates that to take course 0 you have to first take course 1.
Return true if you can finish all courses. Otherwise, return false.
*/
class Solution {

    /**
     * 207. Course Schedule
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites) {
        $graph = array_fill(0, $numCourses, []);
        $inDegree = array_fill(0, $numCourses, 0);
        $queue = [];
        $processedCourses = 0;
        
        foreach ($prerequisites as $pre) {
            [$course, $prereq] = $pre;
            $graph[$prereq][] = $course;
            $inDegree[$course]++;
        }

        for ($i = 0; $i < $numCourses; $i++) {
            if ($inDegree[$i] === 0) {
                $queue[] = $i;
            }
        }

        while (!empty($queue)) {
            $course = array_shift($queue);
            $processedCourses++;

            foreach ($graph[$course] as $nextCourse) {
                $inDegree[$nextCourse]--;
                if ($inDegree[$nextCourse] === 0) {
                    $queue[] = $nextCourse;
                }
            }
        }

        return $processedCourses === $numCourses;        
    }
}

$c = new Solution;
//print_r($c->canFinish(2, [[1,0]])); // Expect true
//print_r($c->canFinish(2, [[1,0],[0,1]])); // Expect false
print_r($c->canFinish(4, [[1,0],[2,1],[3,2]])); // Expect true
?>