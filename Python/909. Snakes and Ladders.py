"""
You are given an n x n integer matrix board where the cells are labeled from 1 to n2 in a 
    Boustrophedon style starting from the bottom left of the board (i.e. board[n - 1][0]) and 
    alternating direction each row.
You start on square 1 of the board. In each move, starting from square curr, do the following:

Choose a destination square next with a label in the range [curr + 1, min(curr + 6, n2)].
This choice simulates the result of a standard 6-sided die roll: i.e., there are always at most 6 destinations, 
    regardless of the size of the board.
If next has a snake or ladder, you must move to the destination of that snake or ladder. Otherwise, you move to next.
The game ends when you reach the square n2.
A board square on row r and column c has a snake or ladder if board[r][c] != -1. 
    The destination of that snake or ladder is board[r][c]. Squares 1 and n2 are not the starting points of any snake or ladder.
Note that you only take a snake or ladder at most once per dice roll. If the destination to a snake or ladder is the start of another snake or ladder, 
    you do not follow the subsequent snake or ladder.
For example, suppose the board is [[-1,4],[-1,3]], and on the first move, your destination square is 2. 
    You follow the ladder to square 3, but do not follow the subsequent ladder to 4.
Return the least number of dice rolls required to reach the square n2. 
    If it is not possible to reach the square, return -1.
"""
# 909. Snakes and Ladders
from typing import List
from collections import deque
class Solution:
    def snakesAndLadders(self, board: List[List[int]]) -> int:
        n = len(board)
        queue = deque([(1, 0)])
        visited = [False] * (n * n + 1)
        visited[1] = True
        
        def flattenBoard() -> List[int]:
            flattened = [-1] * (n * n + 1)
            idx = 1
            
            for row in range(n - 1, -1, -1):
                leftToRight = ((n - 1 - row) % 2 == 0)
                
                if leftToRight:
                    for col in range(0, n):
                        if board[row][col] != -1:
                            flattened[idx] = board[row][col]
                        idx += 1
                else:
                    for col in range(n - 1, -1, -1):
                        if board[row][col] != -1:
                            flattened[idx] = board[row][col]
                        idx += 1
        
            return flattened        
        
        
        flattened = flattenBoard()
        
        while queue:
            position, moves = queue.popleft()
            if position == n * n:
                return moves
            
            for dice in range(1, 7):
                nextPosition = position + dice
                if nextPosition > n * n:
                    break
                
                if flattened[nextPosition] != -1:
                    nextPosition = flattened[nextPosition]
                
                if not visited[nextPosition]:
                    visited[nextPosition] = True
                    queue.append((nextPosition, moves + 1))
        
        return -1


    
            
        
        
    
# Test Code
solution = Solution()
print(solution.snakesAndLadders([[-1,-1,-1,-1,-1,-1],[-1,-1,-1,-1,-1,-1],[-1,-1,-1,-1,-1,-1],[-1,35,-1,-1,13,-1],[-1,-1,-1,-1,-1,-1],[-1,15,-1,-1,-1,-1]])) # Expect 4
print(solution.snakesAndLadders([[-1,-1],[-1,3]])) # Expect 1