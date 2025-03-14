<?php
/*
You are given a 0-indexed integer array candies. Each element in the array denotes a pile of candies of size candies[i]. 
    You can divide each pile into any number of sub piles, but you cannot merge two piles together.
You are also given an integer k. 
    You should allocate piles of candies to k children such that each child gets the same number of candies. 
    Each child can be allocated candies from only one pile of candies and some piles of candies may go unused.
Return the maximum number of candies each child can get.
*/
class Solution {

    /**
     * 2226. Maximum Candies Allocated to K Children
     * @param Integer[] $candies
     * @param Integer $k
     * @return Integer
     */
    public function maximumCandies(array $candies, int $k): int {
        if ($k === 0) { return 0; }
    
        $left = 1;
        $right = max($candies);
        $result = 0;
    
        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);
            if ($this->canDistribute($candies, $k, $mid)) {
                $result = $mid;
                $left = $mid + 1;
            } 
            else {
                $right = $mid - 1;
            }
        }
    
        return $result;
    }
    
    private function canDistribute(array $candies, int $k, int $x): bool {
        $count = 0;
        foreach ($candies as $pile) {
            $count += intdiv($pile, $x);
        }
        return $count >= $k;
    }    
}

$c = new Solution;
//print_r($c->maximumCandies([5,8,6], 3)); // Expect 5
print_r($c->maximumCandies([2,5], 11)); // Expect 0
?>