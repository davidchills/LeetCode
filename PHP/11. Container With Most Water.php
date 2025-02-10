<?php
class Solution {

    /**
     * 11. Container With Most Water
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $left = 0;
        $right = count($height) -1;
        $area = 0;
        while ($left < $right) {
            $shortest = min($height[$left], $height[$right]);
            $tmp = ($shortest * ($right - $left));
            //print "Left: ".$height[$left]." compare to Right: ".$height[$right]." Shortest: ".$shortest." for Area: ".$tmp."\n";
            $area = max($area, $tmp);
            if ($height[$left] > $height[$right]) { $right--; }
            else { $left++; }
        }
        return $area;
    }
}

$c = new Solution;
//print_r($c->maxArea([1,8,6,2,5,4,8,3,7])); // Expect 49
//print_r($c->maxArea([1,1])); // Expect 1
print_r($c->maxArea([1,2,4,3])); // Expect 4
?>