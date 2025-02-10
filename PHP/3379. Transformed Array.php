<?php
class Solution {

    /**
     * 3379. Transformed Array
     * @param Integer[] $nums
     * @return Integer[]
     */
    function constructTransformedArray($nums) {
        $numsLength = count($nums);
        $result = array_fill(0, $numsLength, null);
        for ($i = 0; $i < $numsLength; $i++) {
            if ($nums[$i] === 0) { $result[$i] = $nums[$i]; }
            else {
                $steps = $nums[$i]; 
                $newIndex = ($i + $steps) % $numsLength;
                // Handle negative steps correctly
                if ($newIndex < 0) {
                    $newIndex += $numsLength;
                }
                $result[$i] = $nums[$newIndex];                
            }
        }
        return $result;
    }
}

$c = new Solution;
//print_r($c->constructTransformedArray([3,-2,1,1])); // Expect [1,1,1,3]
print_r($c->constructTransformedArray([-1,4,-1])); // Expect [-1,-1,4]
?>