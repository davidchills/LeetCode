"""
Alice and Bob are playing a turn-based game on a field, with two lanes of flowers between them. 
There are x flowers in the first lane between Alice and Bob, and y flowers in the second lane between them.
The game proceeds as follows:
Alice takes the first turn.
In each turn, a player must choose either one of the lane and pick one flower from that side.
At the end of the turn, if there are no flowers left at all, the current player captures their opponent and wins the game.
Given two integers, n and m, the task is to compute the number of possible pairs (x, y) that satisfy the conditions:
Alice must win the game according to the described rules.
The number of flowers x in the first lane must be in the range [1,n].
The number of flowers y in the second lane must be in the range [1,m].
Return the number of possible pairs (x, y) that satisfy the conditions mentioned in the statement.
"""
# 3021. Alice and Bob Playing Flower Game
import time
from typing import List
class Solution:
    def flowerGame(self, n: int, m: int) -> int:
        odd_n = (n + 1) // 2
        even_n = n// 2
        odd_m = (m + 1) // 2
        even_m = m // 2
        return odd_n * even_m + even_n * odd_m

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.flowerGame(3, 2)) # Expect 3
print(solution.flowerGame(1, 1)) # Expect 0

end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")