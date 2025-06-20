"""
You are given a string s consisting of the characters 'N', 'S', 'E', and 'W', where s[i] indicates movements in an infinite grid:
'N' : Move north by 1 unit.
'S' : Move south by 1 unit.
'E' : Move east by 1 unit.
'W' : Move west by 1 unit.
Initially, you are at the origin (0, 0). You can change at most k characters to any of the four directions.
Find the maximum Manhattan distance from the origin that can be achieved at any time while performing the movements in order.
The Manhattan Distance between two cells (xi, yi) and (xj, yj) is |xi - xj| + |yi - yj|.
"""
# 3443. Maximum Manhattan Distance After K Changes
from collections import Counter
class Solution:
    def maxDistance(self, s: str, k: int) -> int:
        dCounts = Counter()
        dx = 0
        dy = 0
        ans = 0
        for char in s:
            
            dCounts[char] += 1
            if char == 'N':
                dy += 1
            elif char == 'S':
                dy -= 1
            elif char == 'E':
                dx += 1
            else:
                dx -=1
                
            dist = abs(dx) + abs(dy)
            badX = dCounts['W'] if dx > 0 else dCounts['E']
            badY = dCounts['S'] if dy > 0 else dCounts['N']
            moves = k
            gain = 0
            if badX > badY:
                use = min(moves, badX)
                gain += 2 * use
                moves -= use
                use = min(moves, badY)
                gain += 2 * use
            else:
                use = min(moves, badY)
                gain += 2 * use
                moves -= use
                use = min(moves, badX)
                gain += 2 * use
                
            ans = max(ans, dist + gain)
            
        return ans
       

    
# Test Code
solution = Solution()
print(solution.maxDistance("NWSE", 1)) # Expect 3
print(solution.maxDistance("NSWWEW", 3)) # Expect 6

