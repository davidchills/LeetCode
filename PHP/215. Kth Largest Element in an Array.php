<?php
/*
Given an integer array nums and an integer k, return the kth largest element in the array.
Note that it is the kth largest element in the sorted order, not the kth distinct element.
Can you solve it without sorting?
*/
class Solution {

    /**
     * 215. Kth Largest Element in an Array
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        $minHeap = new SplMinHeap();
        foreach ($nums as $num) {
            $minHeap->insert($num);
            if ($minHeap->count() > $k) {
                $minHeap->extract();
            }
        }
        return $minHeap->top();        
    }
}

$c = new Solution;
print_r($c->findKthLargest([3,2,1,5,6,4], 2)); // Expect 5
//print_r($c->findKthLargest([3,2,3,1,2,4,5,5,6], 4)); // Expect 4
?>