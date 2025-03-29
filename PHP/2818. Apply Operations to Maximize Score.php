<?php
/*
You are given an array nums of n positive integers and an integer k.
Initially, you start with a score of 1. You have to maximize your score by applying the following operation at most k times:
Choose any non-empty subarray nums[l, ..., r] that you haven't chosen previously.
Choose an element x of nums[l, ..., r] with the highest prime score. If multiple such elements exist, choose the one with the smallest index.
Multiply your score by x.
Here, nums[l, ..., r] denotes the subarray of nums starting at index l and ending at the index r, both ends being inclusive.
The prime score of an integer x is equal to the number of distinct prime factors of x. 
    For example, the prime score of 300 is 3 since 300 = 2 * 2 * 3 * 5 * 5.
Return the maximum possible score after applying at most k operations.
Since the answer may be large, return it modulo 109 + 7.
*/
class Solution {
    const MOD = 1000000007;
    /**
     * 2818. Apply Operations to Maximize Score
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maximumScore($nums, $k) {
        $n = count($nums);

        // Step 1: Prime scores
        $primeScores = array_map([$this, 'countDistinctPrimes'], $nums);

        // Step 2: Monotonic stack to find left and right boundaries
        $left = array_fill(0, $n, -1);
        $right = array_fill(0, $n, $n);
        $stack = [];

        for ($i = 0; $i < $n; $i++) {
            while (!empty($stack) && $primeScores[$stack[count($stack) - 1]] < $primeScores[$i]) {
                $idx = array_pop($stack);
                $right[$idx] = $i;
            }
            $left[$i] = empty($stack) ? -1 : $stack[count($stack) - 1];
            $stack[] = $i;
        }

        // Step 3: Sort indices by nums descending
        $indices = range(0, $n - 1);
        usort($indices, function($a, $b) use ($nums) {
            return $nums[$b] <=> $nums[$a];
        });

        // Step 4: Apply operations greedily
        $score = 1;
        foreach ($indices as $i) {
            $count = ($i - $left[$i]) * ($right[$i] - $i);
            $take = min($k, $count);
            $score = ($score * $this->modPow($nums[$i], $take, self::MOD)) % self::MOD;
            $k -= $take;
            if ($k == 0) break;
        }

        return $score;
    }

    private function modPow($base, $exp, $mod) {
        $result = 1;
        $base %= $mod;
        while ($exp > 0) {
            if ($exp % 2 === 1) {
                $result = ($result * $base) % $mod;
            }
            $base = ($base * $base) % $mod;
            $exp = intdiv($exp, 2);
        }
        return $result;
    }

    private function countDistinctPrimes($num) {
        $count = 0;
        if ($num % 2 === 0) {
            $count++;
            while ($num % 2 === 0) $num = intdiv($num, 2);
        }
        for ($i = 3; $i * $i <= $num; $i += 2) {
            if ($num % $i === 0) {
                $count++;
                while ($num % $i === 0) $num = intdiv($num, $i);
            }
        }
        if ($num > 1) $count++;
        return $count;
    }
}

$c = new Solution;
print $c->maximumScore([8,3,9,3,8], 2)."\n"; // Expect 81
print $c->maximumScore([19,12,14,6,10,18], 3)."\n"; // Expect 4788

?>