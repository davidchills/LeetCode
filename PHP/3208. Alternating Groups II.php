<?php
/*
There is a circle of red and blue tiles. You are given an array of integers colors and an integer k. 
    The color of tile i is represented by colors[i]:
colors[i] == 0 means that tile i is red.
colors[i] == 1 means that tile i is blue.
An alternating group is every k contiguous tiles in the circle with alternating colors 
    (each tile in the group except the first and last one has a different color from its left and right tiles).
Return the number of alternating groups.
Note that since colors represents a circle, the first and the last tiles are considered to be next to each other.
*/
class Solution {

    /**
     * 3208. Alternating Groups II
     * @param Integer[] $colors
     * @param Integer $k
     * @return Integer
     */
    public function numberOfAlternatingGroups(array $colors, int $k): int {
        $n = count($colors);
        if ($n < $k) { return 0; }
    
        $count = 0;
        $validGroups = 0;
        
        // Step 1: Count how many tiles are alternating
        $alternatingCount = 1; 
    
        for ($i = 1; $i < $n; $i++) {
            if ($colors[$i] !== $colors[$i - 1]) {
                $alternatingCount++;
            } 
            else {
                $alternatingCount = 1; // Reset when pattern breaks
            }
    
            // If we have at least `k` alternating tiles, it's a valid group
            if ($alternatingCount >= $k) {
                $validGroups++;
            }
        }
    
        // Step 2: Handle circular cases
        for ($i = 0; $i < $k - 1; $i++) {
            if ($colors[$i] !== $colors[($n + $i - 1) % $n]) {
                $alternatingCount++;
            } 
            else {
                $alternatingCount = 1;
            }
    
            if ($alternatingCount >= $k) {
                $validGroups++;
            }
        }
    
        return $validGroups;
    }    
}

$c = new Solution;
//print_r($c->numberOfAlternatingGroups([0,1,0,1,0], 3)); // Expect 3
//print_r($c->numberOfAlternatingGroups([0,1,0,0,1,0,1], 6)); // Expect 2
print_r($c->numberOfAlternatingGroups([1,1,0,1], 4)); // Expect 0
?>