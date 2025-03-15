<?php
/*
There are several consecutive houses along a street, each of which has some money inside. 
    There is also a robber, who wants to steal money from the homes, but he refuses to steal from adjacent homes.
The capability of the robber is the maximum amount of money he steals from one house of all the houses he robbed.
You are given an integer array nums representing how much money is stashed in each house. 
    More formally, the ith house from the left has nums[i] dollars.
You are also given an integer k, representing the minimum number of houses the robber will steal from. 
    It is always possible to steal at least k houses.
Return the minimum capability of the robber out of all the possible ways to steal at least k houses.
*/
class Solution {

    /**
     * 2560. House Robber IV
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    public function minCapability(array $nums, int $k): int {
        $left = min($nums);
        $right = max($nums);
        $result = $right;
    
        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);
            if ($this->canRobAtLeastK($nums, $mid, $k)) {
                $result = $mid;
                $right = $mid - 1;
            } 
            else {
                $left = $mid + 1;
            }
        }
        return $result;
    }
    
    private function canRobAtLeastK(array $nums, int $capability, int $k): bool {
        $count = 0;
        $i = 0;
        
        while ($i < count($nums)) {
            if ($nums[$i] <= $capability) {
                $count++;
                if ($count === $k) { return true; }
                $i++;
            }
            $i++;
        }
        return false;        
    }
}

$c = new Solution;
print_r($c->minCapability([2,3,5,9], 2)); // Expect 5
//print_r($c->minCapability([2,7,9,3,1], 2)); // Expect 2

?>