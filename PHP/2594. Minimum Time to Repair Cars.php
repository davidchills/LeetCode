<?php
/*
You are given an integer array ranks representing the ranks of some mechanics. 
    ranksi is the rank of the ith mechanic. A mechanic with a rank r can repair n cars in r * n2 minutes.
You are also given an integer cars representing the total number of cars waiting in the garage to be repaired.
Return the minimum time taken to repair all the cars.
Note: All the mechanics can repair the cars simultaneously.
*/
class Solution {

    /**
     * 2594. Minimum Time to Repair Cars
     * @param Integer[] $ranks
     * @param Integer $cars
     * @return Integer
     */
    public function repairCars(array $ranks, int $cars): int {
        $left = 1;
        $right = min($ranks) * $cars * $cars;
        $result = $right;
    
        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);
            if ($this->canRepairAllCars($ranks, $cars, $mid)) {
                $result = $mid;
                $right = $mid - 1;
            } 
            else {
                $left = $mid + 1;
            }
        }
        return $result;        
    }
    
    private function canRepairAllCars(array $ranks, int $cars, int $timeLimit): bool {
        $totalCars = 0;
        foreach ($ranks as $rank) {
            $maxCars = floor(sqrt($timeLimit / $rank));
            $totalCars += $maxCars;
            if ($totalCars >= $cars) { return true; }
        }
        return false;
    }    
}

$c = new Solution;
//print_r($c->repairCars([4,2,3,1], 10)); // Expect 16
print_r($c->repairCars([5,1,8], 6)); // Expect 16

?>