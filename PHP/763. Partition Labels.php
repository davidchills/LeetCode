<?php
/*
You are given a string s. We want to partition the string into as many parts as possible so that each letter appears in at most one part. 
    For example, the string "ababcc" can be partitioned into ["abab", "cc"], 
    but partitions such as ["aba", "bcc"] or ["ab", "ab", "cc"] are invalid.
Note that the partition is done so that after concatenating all the parts in order, the resultant string should be s.
Return a list of integers representing the size of these parts.
*/
class Solution {

    /**
     * 763. Partition Labels
     * @param String $s
     * @return Integer[]
     */
    function partitionLabels($s) {
        $n = strlen($s);
        $hashMap = [];
        $partitions = [];
        for ($i = 0; $i < $n; $i++) {
            $hashMap[$s[$i]] = $i;
        }
        $start = 0;
        $end = 0;
        for ($i = 0; $i < $n; $i++) {
            $end = max($end, $hashMap[$s[$i]]);
            if ($i == $end) {
                $partitions[] = $end - $start + 1;
                $start = $i + 1;
            }
        }
        return $partitions;
    }
}

$c = new Solution;
print_r($c->partitionLabels("ababcbacadefegdehijhklij")); // Expect [9,7,8]
print "\n";
print_r($c->partitionLabels("eccbbbbdec")); // Expect [10]

?>