<?php
/*
You have a long flowerbed in which some of the plots are planted, and some are not. However, flowers cannot be planted in adjacent plots.

Given an integer array flowerbed containing 0's and 1's, where 0 means empty and 1 means not empty, and an integer n, 
    return true if n new flowers can be planted in the flowerbed without violating the no-adjacent-flowers rule and false otherwise.
*/
class Solution {

    /**
     * 605. Can Place Flowers
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        $l = count($flowerbed);

        for ($i = 0; $i < $l; $i++) { 
            if ($flowerbed[$i] == 0 &&
                ($i === 0 || $flowerbed[$i - 1] === 0) &&
                ($i == $l - 1 || $flowerbed[$i + 1] == 0)) {
                    $flowerbed[$i] = 1;
                    $n--;
                    if ($n === 0) { return true; }
            }
        }
        return $n <= 0;
    }
}

$c = new Solution;
print_r($c->canPlaceFlowers([1,0,0,0,1], 1)); // Expect true
//print_r($c->canPlaceFlowers([1,0,0,0,1], 2)); // Expect false
?>