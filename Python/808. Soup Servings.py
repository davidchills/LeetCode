"""
You have two soups, A and B, each starting with n mL. 
On every turn, one of the following four serving operations is chosen at random, each with probability 0.25 independent of all previous turns:
pour 100 mL from type A and 0 mL from type B
pour 75 mL from type A and 25 mL from type B
pour 50 mL from type A and 50 mL from type B
pour 25 mL from type A and 75 mL from type B
Note:
There is no operation that pours 0 mL from A and 100 mL from B.
The amounts from A and B are poured simultaneously during the turn.
If an operation asks you to pour more than you have left of a soup, pour all that remains of that soup.
The process stops immediately after any turn in which one of the soups is used up.
Return the probability that A is used up before B, plus half the probability that both soups are used up in the same turn. 
Answers within 10-5 of the actual answer will be accepted.
"""
# 808. Soup Servings
from functools import lru_cache
from math import ceil
class Solution:
    def soupServings(self, n: int) -> float:
        # For large n the answer approaches 1 quickly (within 1e-5 by ~4800).
        if n >= 4800:
            return 1.0

        m = ceil(n / 25)  # work in units of 25 mL

        @lru_cache(None)
        def dp(a: int, b: int) -> float:
            # Base cases
            if a <= 0 and b <= 0:
                return 0.5
            if a <= 0:
                return 1.0
            if b <= 0:
                return 0.0
            # 4 equiprobable serving options (in 25 mL units)
            return 0.25 * (
                dp(a - 4, b) +
                dp(a - 3, b - 1) +
                dp(a - 2, b - 2) +
                dp(a - 1, b - 3)
            )

        return dp(m, m)       

    
# Test Code
solution = Solution()
print(solution.soupServings(50)) # Expect 0.62500
print(solution.soupServings(100)) # Expect 0.71875
