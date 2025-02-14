<?php
/*
You are given an array of integers stones where stones[i] is the weight of the ith stone.

We are playing a game with the stones. On each turn, we choose the heaviest two stones and smash them together. Suppose the heaviest two stones have weights x and y with x <= y. The result of this smash is:

If x == y, both stones are destroyed, and
If x != y, the stone of weight x is destroyed, and the stone of weight y has new weight y - x.
At the end of the game, there is at most one stone left.

Return the weight of the last remaining stone. If there are no stones left, return 0.
*/
class Solution {

    /**
     * 1046. Last Stone Weight
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        $heap = new SplMaxHeap();
        // Put all the stones in MaxHeap so the heaviest is always on top.
        foreach ($stones as $stone) {
            $heap->insert($stone);
        }
        
        while ($heap->count() >= 2) {
            // Extract the two heaviest stones. 
            $y = $heap->extract();
            $x = $heap->extract();
            print 
            // If the weight wasn't equel, insert the modified weight of one back in.
            if ($x !== $y) {
                $y -= $x;
                $heap->insert($y);
            }
        }
        // If no stones left, then zero or pull the last stones weight.
        return $heap->count() ? $heap->extract() : 0;
    }
}

$c = new Solution;
//print_r($c->lastStoneWeight([2,7,4,1,8,1])); // Expect 1
//print_r($c->lastStoneWeight([1])); // Expect 1
print_r($c->lastStoneWeight([4,3,4,3,2])); // Expect 2
?>