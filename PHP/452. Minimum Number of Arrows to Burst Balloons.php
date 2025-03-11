<?php
/*
There are some spherical balloons taped onto a flat wall that represents the XY-plane. 
    The balloons are represented as a 2D integer array points where points[i] = [xstart, xend] 
    denotes a balloon whose horizontal diameter stretches between xstart and xend. You do not know the exact y-coordinates of the balloons.
Arrows can be shot up directly vertically (in the positive y-direction) from different points along the x-axis. 
    A balloon with xstart and xend is burst by an arrow shot at x if xstart <= x <= xend. There is no limit to the number of arrows that can be shot. 
    A shot arrow keeps traveling up infinitely, bursting any balloons in its path.
Given the array points, return the minimum number of arrows that must be shot to burst all balloons.
*/
class Solution {

    /**
     * 452. Minimum Number of Arrows to Burst Balloons
     * @param Integer[][] $points
     * @return Integer
     */
    function findMinArrowShots($points) {
        if (empty($points)) { return 0; }
    
        // Sort balloons by their end position (xend) in ascending order
        usort($points, function($a, $b) {
            return $a[1] <=> $b[1]; // Sort by xend
        });
    
        $arrows = 1; // At least one arrow is needed
        $lastArrow = $points[0][1]; // Shoot first arrow at the end of the first balloon
    
        foreach ($points as $balloon) {
            $xstart = $balloon[0];
            $xend = $balloon[1];
    
            if ($xstart > $lastArrow) {
                // If balloon starts after the last arrow shot, shoot a new arrow
                $arrows++;
                $lastArrow = $xend; // Update last shot position
            }
        }
    
        return $arrows;        
    }
}

$c = new Solution;
//print_r($c->findMinArrowShots([[10,16],[2,8],[1,6],[7,12]])); // Expect 2
//print_r($c->findMinArrowShots([[1,2],[3,4],[5,6],[7,8]])); // Expect 4
print_r($c->findMinArrowShots([[1,2],[2,3],[3,4],[4,5]])); // Expect 2
?>