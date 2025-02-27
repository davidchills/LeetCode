<?php
/*
A sequence x1, x2, ..., xn is Fibonacci-like if:
    • n >= 3
    • xi + xi+1 == xi+2 for all i + 2 <= n
Given a strictly increasing array arr of positive integers forming a sequence, return the length of the longest 
    Fibonacci-like subsequence of arr. If one does not exist, return 0.
A subsequence is derived from another sequence arr by deleting any number of elements (including none) from arr, 
    without changing the order of the remaining elements. For example, [3, 5, 8] is a subsequence of [3, 4, 5, 6, 7, 8].
*/
class Solution {

    /**
     * 873. Length of Longest Fibonacci Subsequence
     * @param Integer[] $arr
     * @return Integer
     */
    function lenLongestFibSubseq($arr) {
        $n = count($arr);
        if ($n < 4) { return 0; }
        $longest = 0;
        $keys = array_flip($arr);
        
        for ($i = 0; $i < $n; $i++) {
            $seq = 2;
            $first = $arr[$i];
            for ($j = $i + 1; $j < $n; $j++) {
                $second = $arr[$j];
                if (isset($keys[$first + $second])) {
                    $seq++;
                    $first = $second;
                }
            }
            if ($seq > 2) {
                $longest = max($longest, $seq);
            }
        }
        return $longest;
    }
}

$c = new Solution;
//print_r($c->lenLongestFibSubseq([1,2,3,4,5,6,7,8])); // Expect 5
//print_r($c->lenLongestFibSubseq([1,3,7,11,12,14,18])); // Expect 3
print_r($c->lenLongestFibSubseq([2,4,7,8,9,10,14,15,18,23,32,50])); // Expect 5
?>