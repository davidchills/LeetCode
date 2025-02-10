<?php
class Solution {

    /**
     * 15. 3Sum
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $rv = [];
        sort($nums);
        $n = count($nums);
        for ($i = 0; $i < $n - 2; $i++) {
            if ($i > 0 && $nums[$i] === $nums[$i-1]) { continue; }
            $target = -$nums[$i];
            $left = $i+1;
            $right = $n-1;
            
            while($left < $right) {
                $sum = ($nums[$left] + $nums[$right]);
                if ($sum === $target) {
                    $rv[] = [$nums[$i], $nums[$left], $nums[$right]];
                    while ($left < $right && $nums[$left] === $nums[$left+1]) { $left++; }
                    while ($left < $right && $nums[$right] === $nums[$right-1]) { $right--; }
                    $left++;
                    $right--;
                }
                elseif ($sum < $target) { $left++; }
                else { $right--; }
            }
        }
        return $rv;
    }
}

$c = new Solution;
print_r($c->threeSum([-1,0,1,2,-1,-4])); // Expect [[-1,-1,2],[-1,0,1]]
//print_r($c->threeSum([0,1,1])); // Expect []
//print_r($c->threeSum([0,0,0])); // Expect [0,0,0]

?>