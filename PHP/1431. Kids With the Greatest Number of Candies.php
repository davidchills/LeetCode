<?php
/*
There are n kids with candies. You are given an integer array candies, where each candies[i] represents the number of candies the ith kid has, and an integer extraCandies, denoting the number of extra candies that you have.

Return a boolean array result of length n, where result[i] is true if, after giving the ith kid all the extraCandies, they will have the greatest number of candies among all the kids, or false otherwise.

Note that multiple kids can have the greatest number of candies.
*/
class Solution {

    /**
     * 1431. Kids With the Greatest Number of Candies
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies) {
        $n = count($candies);
        //$result = array_fill(0, $n, false);
        $oldMax = max($candies);
        for ($i = 0; $i < $n; $i++) {
            /*
            if (($candies[$i]+$extraCandies) >= $oldMax) {
                $result[$i] = true;
            }
            */
            $candies[$i] = ($candies[$i]+$extraCandies) >= $oldMax;
        }
        return $candies;
    }
}

$c = new Solution;
//print_r($c->kidsWithCandies([2,3,5,1,3], 3)); // Expect [true,true,true,false,true] 
print_r($c->kidsWithCandies([4,2,1,1,2], 1)); // Expect [true,false,false,false,false] 
//print_r($c->kidsWithCandies([12,1,12], 10)); // Expect [true,false,true] 
?>