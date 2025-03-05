<?php
/*
There is a biker going on a road trip. The road trip consists of n + 1 points at different altitudes. 
    The biker starts his trip on point 0 with altitude equal 0.
You are given an integer array gain of length n where gain[i] is the net gain in altitude between points i​​​​​​ and i + 1 for all (0 <= i < n). 
    Return the highest altitude of a point.
*/
class Solution {

    /**
     * 1732. Find the Highest Altitude
     * @param Integer[] $gain
     * @return Integer
     */
    function largestAltitude($gain) {
        $n = count($gain);
        $maxAlt = 0;
        $lastAlt = 0;
        
        for ($i = 0; $i < $n; $i++) {
            $lastAlt += $gain[$i];
            $maxAlt = max($maxAlt, $lastAlt);
        }
        return $maxAlt;
    }
}

$c = new Solution;
//print_r($c->largestAltitude([-5,1,5,0,-7])); // Expect 1
print_r($c->largestAltitude([-4,-3,-2,-1,4,3,2])); // Expect 0
?>