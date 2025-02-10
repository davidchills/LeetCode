<?php
class Solution {

    /**
     * 3289. The Two Sneaky Numbers of Digitville
     * @param Integer[] $nums
     * @return Integer[]
     */
    function getSneakyNumbers($nums) {
        $counts =  array_count_values($nums);
        $out = [];
        foreach ($counts as $k => $v) {
            if ($v > 1) { $out[] = $k; }
        }
        return $out;
    }
}

$c = new Solution;
//print_r($c->getSneakyNumbers([0,1,1,0])); // Expect [0,1]
//print_r($c->getSneakyNumbers([0,3,2,1,3,2])); // Expect [2,3]
print_r($c->getSneakyNumbers([7,1,5,4,3,4,6,0,9,5,8,2])); // Expect [4,5]
?>