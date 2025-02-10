<?php
class Solution {

    /**
     * 3285. Find Indices of Stable Mountains
     * @param Integer[] $height
     * @param Integer $threshold
     * @return Integer[]
     */
    function stableMountains(array $height, int $threshold): array {
        $out = [];
        for ($i = 1; $i < count($height); $i++) {
            if ($height[$i-1] > $threshold) { 
                $out[] = $i; 
            }
        }
        return $out;
    }
}

$c = new Solution;
//print_r($c->stableMountains([1,2,3,4,5], 2)); // Expect [3,4]
//print_r($c->stableMountains([10,1,10,1,10], 2)); // Expect [1,3]
print_r($c->stableMountains([10,1,10,1,10], 10)); // Expect []
?>