<?php
class Solution {

    /**
     * 56. Merge Intervals
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        if (empty($intervals)) { return []; }
    
        // Sort intervals based on start time
        usort($intervals, function($a, $b) {
            return $a[0] - $b[0];
        });
    
        $merged = [$intervals[0]];
    
        foreach ($intervals as $interval) {
            $last = end($merged);
    
            if ($interval[0] <= $last[1]) {
                // Merge overlapping intervals
                $merged[count($merged) - 1][1] = max($last[1], $interval[1]);
            } 
            else {
                // No overlap, add new interval
                $merged[] = $interval;
            }
        }
    
        return $merged;
    }
}

$c = new Solution;
//print_r($c->merge([[1,3],[2,6],[8,10],[15,18]])); // Expect [[1,6],[8,10],[15,18]]
print_r($c->merge([[1,4],[4,5]])); // Expect [[1,5]]
?>