<?php
/*
Given a positive integer n, return the punishment number of n.

The punishment number of n is defined as the sum of the squares of all integers i such that:

1 <= i <= n
The decimal representation of i * i can be partitioned into contiguous substrings such that the sum of the integer values of these substrings equals i.

*/
class Solution {

    /**
     * 2698. Find the Punishment Number of an Integer
     * @param Integer $n
     * @return Integer
     */
    public function punishmentNumber(int $n): int {
        if ($n < 1) { return 0; } 
        $result = 1;
        
        for ($i = 2; $i <= $n; $i++) {
            $num = $i;
            $mod = ($num%9);
            if ($mod === 0 || $mod === 1) {
                $sq = (string) ($num * $num);
                $result += ($this->partition($sq, 0, [], $num)) ? (int) $sq : 0;
            }
        }
        return $result;
    }
    
    
    private function partition(string $sq, int $start, array $parts, int $num): bool {
        $n = strlen($sq);
        if ($start === $n) {
            return array_sum($parts) === $num;
        }
        
        for ($i = $start; $i < $n; $i++) {
            $part = substr($sq, $start, $i - $start + 1);
            $parts[] = (int) $part;
            if ($this->partition($sq, $i + 1, $parts, $num)) {
                return true;
            }
            array_pop($parts);
        }
        return false;
    }    
}

$c = new Solution;
//print_r($c->punishmentNumber(10)); // Expect 182
print_r($c->punishmentNumber(37)); // Expect 1478
// https://leetcode.com/problems/find-the-punishment-number-of-an-integer/submissions/1543409189
?>