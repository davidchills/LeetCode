"""
There is a game dungeon comprised of n x n rooms arranged in a grid.
You are given a 2D array fruits of size n x n, where fruits[i][j] represents the number of fruits in the room (i, j). 
Three children will play in the game dungeon, with initial positions at the corner rooms (0, 0), (0, n - 1), and (n - 1, 0).
The children will make exactly n - 1 moves according to the following rules to reach the room (n - 1, n - 1):
• The child starting from (0, 0) must move from their current room (i, j) to one of the rooms (i + 1, j + 1), (i + 1, j), 
    and (i, j + 1) if the target room exists.
• The child starting from (0, n - 1) must move from their current room (i, j) to one of the rooms (i + 1, j - 1), (i + 1, j), 
    and (i + 1, j + 1) if the target room exists.
• The child starting from (n - 1, 0) must move from their current room (i, j) to one of the rooms (i - 1, j + 1), (i, j + 1), 
    and (i + 1, j + 1) if the target room exists.
When a child enters a room, they will collect all the fruits there. 
If two or more children enter the same room, only one child will collect the fruits, and the room will be emptied after they leave.
Return the maximum number of fruits the children can collect from the dungeon.
"""
# 3363. Find the Maximum Number of Fruits Collected
from typing import List
import math
class Solution:
    def maxCollectedFruits(self, fruits: List[List[int]]) -> int:
        size = len(fruits)
        total = 0
        for i in range(size):
            total += fruits[i][i]

        right_path = [fruits[0][size - 1], 0, 0]
        bottom_path = [fruits[size - 1][0], 0, 0]
        window = 2

        for step in range(1, size - 1):
            new_right = [0] * (window + 2)
            new_bottom = [0] * (window + 2)
            for dist in range(window):
                new_bottom[dist] = (
                    max(bottom_path[dist - 1], bottom_path[dist], bottom_path[dist + 1])
                    + fruits[size - 1 - dist][step]
                )

                new_right[dist] = (
                    max(right_path[dist - 1], right_path[dist], right_path[dist + 1])
                    + fruits[step][size - 1 - dist]
                )

            bottom_path = new_bottom
            right_path = new_right

            if window - size + 4 + step <= 1:
                window += 1
            elif window - size + 3 + step > 1:
                window -= 1

        return total + right_path[0] + bottom_path[0]   

    
# Test Code
solution = Solution()
print(solution.maxCollectedFruits([[1,2,3,4],[5,6,8,7],[9,10,11,12],[13,14,15,16]])) # Expect 100
print(solution.maxCollectedFruits([[1,1],[1,1]])) # Expect 4
print(solution.maxCollectedFruits([[11,15,18,7],[8,15,5,19],[15,20,4,10],[15,3,10,5]])) # Expect 116
