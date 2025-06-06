<?php
/*
You have k bags. You are given a 0-indexed integer array weights where weights[i] is the weight of the ith marble. 
    You are also given the integer k.
Divide the marbles into the k bags according to the following rules:
No bag is empty.
If the ith marble and jth marble are in a bag, then all marbles with an index between the ith and jth indices should also be in that same bag.
If a bag consists of all the marbles with an index from i to j inclusively, then the cost of the bag is weights[i] + weights[j].
The score after distributing the marbles is the sum of the costs of all the k bags.
Return the difference between the maximum and minimum scores among marble distributions.
*/
class Solution {

    /**
     * 2551. Put Marbles in Bags
     * @param Integer[] $weights
     * @param Integer $k
     * @return Integer
     */
    function putMarbles($weights, $k) {
        $n = count($weights);
        if ($k == 1) { return 0; }
        $pairCosts = [];
        for ($i = 0; $i < $n - 1; $i++) {
            $pairCosts[] = $weights[$i] + $weights[$i + 1];
        }
        sort($pairCosts);
        $minSum = array_sum(array_slice($pairCosts, 0, $k - 1));
        $maxSum = array_sum(array_slice($pairCosts, -($k - 1)));

        return $maxSum - $minSum;        
    }
}

$c = new Solution;
print_r($c->putMarbles([1,3,5,1], 2)); // Expect 4
print "\n";
print_r($c->putMarbles([1, 3], 2)); // Expect 0

?>