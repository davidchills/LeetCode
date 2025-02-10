<?php
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