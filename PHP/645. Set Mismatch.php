<?php
class Solution {

    /**
     * 645. Set Mismatch
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findErrorNums($nums) {
        $n = count($nums);
        $actualSum = array_sum($nums);
        $expectedSum = ($n * ($n + 1)) / 2;
        $numCounts = array_count_values($nums);
    
        $duplicate = 0;
        foreach ($numCounts as $num => $count) {
            if ($count == 2) {
                $duplicate = $num;
                break;
            }
        }
    
        $missing = $expectedSum - ($actualSum - $duplicate);
        return [$duplicate, $missing];
    }
}

$c = new Solution;
print_r($c->findErrorNums([1,2,2,4])); // Expect [2,3]
//print_r($c->findErrorNums([1,1])); // Expect [1,2]
//print_r($c->findErrorNums([3,2,2])); // Expect [2,1]
//print_r($c->findErrorNums([1,3,3])); // Expect [3,2]
//print_r($c->findErrorNums([3,2,3,4,6,5])); // Expect [3,1]
?>