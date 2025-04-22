<?php
/*
You are given an integer array cost where cost[i] is the cost of ith step on a staircase. 
Once you pay the cost, you can either climb one or two steps.
You can either start from the step with index 0, or the step with index 1.
Return the minimum cost to reach the top of the floor.
*/
class Solution {

    /**
     * 746. Min Cost Climbing Stairs
     * @param Integer[] $cost
     * @return Integer
     */
    function minCostClimbingStairs($cost) {
        $downOne = 0;
        $downTwo = 0;
        for ($i = 2; $i < (count($cost) + 1); $i++) {
            $temp = $downOne;
            $downOne = min($downOne + $cost[$i - 1], $downTwo + $cost[$i - 2]);
            $downTwo = $temp;
        }
        return $downOne;
    }
}

$c = new Solution;
print_r($c->minCostClimbingStairs([10,15,20])); // Expect 15
print "\n";
print_r($c->minCostClimbingStairs([1,100,1,1,1,100,1,1,100,1])); // Expect 6

?>