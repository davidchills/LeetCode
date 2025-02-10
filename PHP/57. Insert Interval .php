<?php
class Solution {

    /**
     * 57. Insert Interval
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    function insert($intervals, $newInterval) {
        /*
        if (empty($intervals)) { return [$newInterval]; }
        $inserted = false;
        // find a spot for new interval.
        for ($i = 0; $i < count($intervals); $i++) {
            if ($newInterval[1] < $intervals[$i][0]) {
                array_unshift($intervals, $newInterval);
                return $intervals;
            }
            if ($newInterval[0] < $intervals[$i][0]) { $intervals[$i][0] = $newInterval[0]; }
            if ($intervals[$i][1] >= $newInterval[0]) {
                if ($newInterval[1] < $intervals[$i][1]) { 
                    return $intervals; 
                }
                $intervals[$i][1] = $newInterval[1];
                $inserted = true;
                break;
            }
        }
        
        // If newInterval wasn't inserted, append it the end and return;
        if ($inserted === false) { 
            array_push($intervals, $newInterval); 
            return $intervals;
        }
        
        // Merge intervals as needed after new interval added.
        $merged = [$intervals[0]];        
        foreach ($intervals as $interval) {
            $last = end($merged);
            if ($interval[0] <= $last[1]) {
                $merged[count($merged) - 1][1] = max($last[1], $interval[1]);
            } 
            else { $merged[] = $interval; }
        }
    
        return $merged; 
        */
        $result = [];
        $i = 0;
        $n = count($intervals);

        // Add all intervals that come before the new interval
        while ($i < $n && $intervals[$i][1] < $newInterval[0]) {
            $result[] = $intervals[$i];
            $i++;
        }

        // Merge overlapping intervals
        while ($i < $n && $intervals[$i][0] <= $newInterval[1]) {
            $newInterval[0] = min($newInterval[0], $intervals[$i][0]);
            $newInterval[1] = max($newInterval[1], $intervals[$i][1]);
            $i++;
        }
        $result[] = $newInterval;

        // Add all intervals that come after the merged interval
        while ($i < $n) {
            $result[] = $intervals[$i];
            $i++;
        }

        return $result;        
    }
}

$c = new Solution;
//print_r($c->insert([[1,3],[6,9]], [2,5])); // Expect [[1,5],[6,9]]
//print_r($c->insert([[1,2],[3,5],[6,7],[8,10],[12,16]], [4,8])); // Expect [[1,2],[3,10],[12,16]]
//print_r($c->insert([], [5,7])); // Expect [[5,7]]
//print_r($c->insert([[1,5]], [2,3])); // Expect [[1,5]]
//print_r($c->insert([[1,5]], [6,8])); // Expect [[1,5],[6,8]]
//print_r($c->insert([[1,5]], [0,3])); // Expect [[0,5]]
//print_r($c->insert([[0,0]], [1,5])); // Expect [[0,0],[1,5]] 
print_r($c->insert([[3,5],[12,15]], [6,6])); // Expect [[3,5],[6,6],[12,15]]
?>