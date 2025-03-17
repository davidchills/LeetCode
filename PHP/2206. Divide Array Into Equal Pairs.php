<?php
/*
You are given an integer array nums consisting of 2 * n integers.
You need to divide nums into n pairs such that:
Each element belongs to exactly one pair.
The elements present in a pair are equal.
Return true if nums can be divided into n pairs, otherwise return false.
*/
class Solution {

    /**
     * 2206. Divide Array Into Equal Pairs
     * @param Integer[] $nums
     * @return Boolean
     */
    public function divideArray(array $nums): bool {
        $hash = [];
        foreach($nums as $num) {
            $hash[$num] = ($hash[$num] ?? 0) + 1;
        }
        foreach($hash as $count) {
            if ($count % 2 !== 0) { return false; }
        }
        return true;
    }
}

$c = new Solution;
print_r($c->divideArray([3,2,3,2,2,2])); // Expect true
//print_r($c->divideArray([1,2,3,4])); // Expect false

?>