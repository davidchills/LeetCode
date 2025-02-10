<?php
class Solution {

    /**
     * 42. Trapping Rain Water
     * Given n non-negative integers representing an elevation map where the width of each bar is 1, compute how much water it can trap after raining.
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $kount = count($height);
        if ($kount == 0) { return 0; }
    
        $left = 0;
        $right = $kount - 1;
        $maxLeft = 0;
        $maxRight = 0;
        $water = 0;
    
        while ($left <= $right) {
            if ($height[$left] <= $height[$right]) {
                if ($height[$left] >= $maxLeft) { $maxLeft = $height[$left]; } 
                else {
                    // Water trapped above this bar
                    $water += ($maxLeft - $height[$left]); 
                }
                $left++;
            } 
            else {
                if ($height[$right] >= $maxRight) { $maxRight = $height[$right]; } 
                else {
                    // Water trapped above this bar
                    $water += ($maxRight - $height[$right]); 
                }
                $right--;
            }
        }
    
        return $water;        
    }
}

$c = new Solution;
print_r($c->trap([0,1,0,2,1,0,1,3,2,1,2,1]));
?>