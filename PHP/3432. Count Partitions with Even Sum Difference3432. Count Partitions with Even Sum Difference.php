<?php
class Solution {

    /**
     * 3432. Count Partitions with Even Sum Difference
     * @param Integer[] $nums
     * @return Integer
     */
    function countPartitions($nums) {
        $numsLength = count($nums);
        if ($numsLength < 2) { return 0; }
        $partitions = 0;
        $totalSum = array_sum($nums);
        $prefixSum = 0;
        for ($i = 0; $i < $numsLength - 1; $i++) {
            $prefixSum += $nums[$i];
            $rightSum = $totalSum - $prefixSum;
            if (($prefixSum - $rightSum) % 2 === 0) {
                $partitions++;
            }
        }
        return $partitions;
    }
}

$c = new Solution;
print_r($c->countPartitions([10,10,3,7,6])); // Expect 4
//print_r($c->countPartitions([1,2,2])); // Expect 0
//print_r($c->countPartitions([2,4,6,8])); // Expect 3
?>