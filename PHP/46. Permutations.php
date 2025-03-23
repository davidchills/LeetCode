<?php
/*
Given an array nums of distinct integers, return all the possible permutations. You can return the answer in any order.
*/
class Solution {

    /**
     * 46. Permutations
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $n = count($nums);
        $result = [];
        $sets = [];
        $used = array_fill(0, count($nums), false);
        $this->backtrack($n, $nums, $sets, $used, $result);
        return $result;
    }
    
    private function backtrack(int $n, array $nums, array &$sets, array &$used, array &$result): void {
        if (count($sets) === $n) {
            $result[] = $sets;
            return;
        }
        for ($i = 0; $i < $n; $i++) {
            if ($used[$i]) { continue; }
            $used[$i] = true;
            $sets[] = $nums[$i];
            $this->backtrack($n, $nums, $sets, $used, $result);
            array_pop($sets);
            $used[$i] = false;
        }
    }
}

$c = new Solution;
print_r($c->permute([1,2,3])); // Expect [[1,2,3],[1,3,2],[2,1,3],[2,3,1],[3,1,2],[3,2,1]]
//print_r($c->permute([0,1])); // Expect [[0,1],[1,0]]
//print_r($c->permute([1])); // Expect [[1]]

?>