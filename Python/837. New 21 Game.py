"""
Alice plays the following game, loosely based on the card game "21".
Alice starts with 0 points and draws numbers while she has less than k points. 
During each draw, she gains an integer number of points randomly from the range [1, maxPts], where maxPts is an integer. 
Each draw is independent and the outcomes have equal probabilities.
Alice stops drawing numbers when she gets k or more points.
Return the probability that Alice has n or fewer points.
Answers within 10-5 of the actual answer are considered accepted.
"""
# 837. New 21 Game
class Solution:
    def new21Game(self, n: int, k: int, maxPts: int) -> float:
        # If Alice never draws (k == 0) or even the maximum overshoot can't exceed n, prob = 1
        if k == 0 or n >= k - 1 + maxPts:
            return 1.0

        dp = [0.0] * (n + 1)
        dp[0] = 1.0
        window_sum = 1.0  # sum of dp[j] for j in [i-maxPts, i-1] with j < k
        res = 0.0

        for i in range(1, n + 1):
            dp[i] = window_sum / maxPts
            if i < k:
                window_sum += dp[i]        # still drawing from i
            else:
                res += dp[i]               # stopped at or beyond k, and i <= n counts

            # remove the left edge of the window if applicable
            if i - maxPts >= 0 and i - maxPts < k:
                window_sum -= dp[i - maxPts]

        return res

    
# Test Code
solution = Solution()
print(solution.new21Game(10, 1, 10)) # Expect 1.000
print(solution.new21Game(6, 1, 10)) # Expect 0.600
print(solution.new21Game(21, 17, 10)) # Expect 0.73278

