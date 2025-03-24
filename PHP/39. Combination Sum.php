<?php
/*
Given an array of distinct integers candidates and a target integer target, 
    return a list of all unique combinations of candidates where the chosen numbers sum to target. 
    You may return the combinations in any order.
The same number may be chosen from candidates an unlimited number of times. 
    Two combinations are unique if the frequency of at least one of the chosen numbers is different.
The test cases are generated such that the number of unique combinations that sum up to target is less than 150 combinations 
    for the given input.
*/
class Solution {

    /**
     * 39. Combination Sum
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        $result = [];
        sort($candidates);
        if ($candidates[0] > $target) { return $result; }
        $this->backtrack(0, $target, $candidates, [], $result);
        return $result;
    }
    
    private function backtrack(int $start, int $target, array $candidates, array $combinations, array &$result) {
        if ($target < 0) { return; }
        if ($target === 0) {
            $result[] = $combinations;
            return;
        }
        
        for ($i = $start; $i < count($candidates); $i++) {
            $combinations[] = $candidates[$i];
            $this->backtrack($i, $target - $candidates[$i], $candidates, $combinations, $result);
            array_pop($combinations);
        }
    }
}

$c = new Solution;
//print_r($c->combinationSum([2,3,6,7], 7)); // Expect [[2,2,3],[7]]
//print_r($c->combinationSum([2,3,5], 8)); // Expect [[2,2,2,2],[2,3,3],[3,5]]
print_r($c->combinationSum([2], 1)); // Expect []
?>