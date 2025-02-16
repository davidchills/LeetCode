<?php
/*
You are climbing a staircase. It takes n steps to reach the top.

Each time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?
*/
class Solution {

    /**
     * 70. Climbing Stairs
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        if ($n == 1) { return 1; }
        $dp = array();
        $dp[1] = 1;
        $dp[2] = 2;
        for ($i = 3; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }
        return $dp[$n];
    }
}

$c = new Solution;
//print_r($c->climbStairs(2)); // Expect 2
print_r($c->climbStairs(3)); // Expect 3
?>