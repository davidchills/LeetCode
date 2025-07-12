"""
There is a tournament where n players are participating. 
The players are standing in a single row and are numbered from 1 to n based on their initial standing position 
    (player 1 is the first player in the row, player 2 is the second player in the row, etc.).
The tournament consists of multiple rounds (starting from round number 1). In each round, 
    the ith player from the front of the row competes against the ith player from the end of the row, and the winner advances to the next round. 
When the number of players is odd for the current round, 
    the player in the middle automatically advances to the next round.
For example, if the row consists of players 1, 2, 4, 6, 7
Player 1 competes against player 7.
Player 2 competes against player 6.
Player 4 automatically advances to the next round.
After each round is over, the winners are lined back up in the row based on the original ordering assigned to them initially (ascending order).
The players numbered firstPlayer and secondPlayer are the best in the tournament. 
They can win against any other player before they compete against each other. 
If any two other players compete against each other, either of them might win, and thus you may choose the outcome of this round.
Given the integers n, firstPlayer, and secondPlayer, return an integer array containing two values, 
    the earliest possible round number and the latest possible round number in which these two players will compete against each other, 
    respectively.
"""
# 1900. The Earliest and Latest Rounds Where Players Compete
from functools import lru_cache
from typing import List
import math
class Solution:
    def earliestAndLatest(self, n: int, firstPlayer: int, secondPlayer: int) -> List[int]:
        @lru_cache(None)
        def dp(l, r, k):
            if l == r: return (1, 1)
            if l > r:  return dp(r, l, k)
            half_k = k // 2
            half_k1 = (k + 1) // 2
            min_s = l + r - half_k
            max_s = half_k1
            a, b = math.inf, -math.inf
            for i in range(1, l + 1):
                low1 = l - i + 1
                high1 = r - i
                low2 = min_s - i
                high2 = max_s - i
                j_low = low1 if low1 > low2 else low2
                j_high = high1 if high1 < high2 else high2
                if j_low > j_high:  continue
                for j in range(j_low, j_high + 1):
                    x, y = dp(i, j, half_k1)
                    a = x + 1 if x + 1 < a else a
                    b = y + 1 if y + 1 > b else b
            return (a, b)
        return list(dp(firstPlayer, n - secondPlayer + 1, n))


        # Solution 1:
        @lru_cache(None)
        def dp(l, r, k):
            if l == r:  return (1, 1)
            if l > r:   return dp(r, l, k)
            a, b = math.inf, -math.inf
            for i in range(1, l + 1):
                for j in range(l - i + 1, r - i + 1):
                    s = i + j
                    if l + r - k // 2 <= s <= (k + 1) // 2:
                        x, y = dp(i, j, (k + 1) // 2)
                        if x + 1 < a: a = x + 1
                        if y + 1 > b: b = y + 1
            return (a, b)
        return list(dp(firstPlayer, n - secondPlayer + 1, n))
    
# Test Code
solution = Solution()
print(solution.earliestAndLatest(11, 2, 4)) # Expect [3,4]
print(solution.earliestAndLatest(5, 1, 5)) # Expect [1,1]
