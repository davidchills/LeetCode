<?php
class Solution {

    /**
     * 2017. Grid Game
    * @param Integer[][] $grid
     * @return Integer
     */
    function gridGame($grid) {
        $n = count($grid[0]);
        $pointsForSecond = PHP_INT_MAX;
        $topSum = array_sum($grid[0]);
        $bottomValue = 0;
        for ($i = 0; $i < $n; $i++) {
            $topSum -= $grid[0][$i];
            $pointsForSecond = min($pointsForSecond, max($topSum, $bottomValue));
            $bottomValue += $grid[1][$i];
        }
        return $pointsForSecond;
        /*
        $prefixTop = array_fill(0, $n, 0);  // Prefix sum for grid[0]
        $prefixBottom = array_fill(0, $n, 0);  // Prefix sum for grid[1]
    
        $prefixTop[0] = $grid[0][0];
        $prefixBottom[0] = $grid[1][0];        
        for ($i = 1; $i < $n; $i++) {
            $prefixTop[$i] = $prefixTop[$i-1] + $grid[0][$i];
            $prefixBottom[$i] = $prefixBottom[$i-1] + $grid[1][$i];
        }        

        $minPointsForSecond = PHP_INT_MAX;
    
        // Simulate the first robot's split point
        for ($i = 0; $i < $n; $i++) {
            $topPoints = $prefixTop[$n - 1] - $prefixTop[$i]; // Points left in top row after (0, i)
            $bottomPoints = ($i > 0) ? $prefixBottom[$i - 1] : 0; // Points left in bottom row before (1, i)
            $secondRobotPoints = max($topPoints, $bottomPoints);
    
            // Minimize the points for the second robot
            $minPointsForSecond = min($minPointsForSecond, $secondRobotPoints);
        }
    
        return $minPointsForSecond;
        */
    }
}

$c = new Solution;
print_r($c->gridGame([[2,5,4],[1,5,1]])); // Expect 4
//print_r($c->gridGame([[3,3,1],[8,5,2]])); // Expect 4
//print_r($c->gridGame([[1,3,1,15],[1,3,3,1]])); // Expect 7
?>