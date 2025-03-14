<?php
/**
  * 135. Candy
  * There are n children standing in a line. Each child is assigned a rating value given in the integer array ratings.
  * You are giving candies to these children subjected to the following requirements:
  * Each child must have at least one candy.
  * Children with a higher rating get more candies than their neighbors.
  * Return the minimum number of candies you need to have to distribute the candies to the children.
  **/
class Solution {

    /**
     * @param Integer[] $ratings
     * @return Integer
     */
    function candy($ratings) {
        $kount = count($ratings);
        // Every kid gets at least 1 candy.
        $candies = array_fill(0, $kount, 1);
        // Forwards.
        for ($i = 1; $i < $kount; $i++) {
            // If the current kid is higher than the left kid, current kid gets one more than left kid.
            if ($ratings[$i] > $ratings[$i-1]) { 
                $candies[$i] = $candies[$i - 1] + 1; 
            }
        }
        // Backwards.
        for ($i = $kount - 2; $i >= 0; $i--) {
            // If left kid is higher than right kid, make sure that left kid gets at least 1 more than right kid.
            if ($ratings[$i] > $ratings[$i + 1]) {
                $candies[$i] = max($candies[$i], ($candies[$i + 1] + 1));
            }
        }
        return array_sum($candies);
    }
}

$c = new Solution;
print_r($c->candy([1,0,2]));
?>