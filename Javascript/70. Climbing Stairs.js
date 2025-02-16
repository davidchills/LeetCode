/*
You are climbing a staircase. It takes n steps to reach the top.

Each time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?
*/
/**
 * 70. Climbing Stairs
 * @param {number} n
 * @return {number}
 */
var climbStairs = function(n) {
    if (n === 1) { return 1; }
    const dp = [];
    dp[1] = 1;
    dp[2] = 2;
    for (let i = 3; i <= n; i++) {
        dp[i] = dp[i - 1] + dp[i - 2];
    }
    return dp[n];
};

//console.log(climbStairs(2)); // Expect 2
console.log(climbStairs(3)); // Expect 3


