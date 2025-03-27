"""
Given an m x n grid of characters board and a string word, return true if word exists in the grid.
The word can be constructed from letters of sequentially adjacent cells, 
    where adjacent cells are horizontally or vertically neighboring. The same letter cell may not be used more than once.
"""
# 79. Word Search
from typing import List
class Solution:
    def exist(self, board: List[List[str]], word: str) -> bool:
        self.board = board
        self.word = word
        self.rows = len(board)
        self.cols = len(board[0])
        
        for i in range(0, self.rows):
            for j in range(0, self.cols):
                if self.backtrack(i, j, 0):
                    return True
        
        return False
    
    def backtrack(self, i: int, j: int, index: int) -> bool:
        if index == len(self.word):
            return True
        
        if i < 0 or i >= self.rows or j < 0 or j >= self.cols:
            return False
        
        if self.board[i][j] != self.word[index]:
            return False
        
        tempValueHolder = self.board[i][j]
        self.board[i][j] = "#"
        
        found = self.backtrack(i + 1, j, index + 1) or \
        self.backtrack(i - 1, j, index + 1) or \
        self.backtrack(i, j + 1, index + 1) or \
        self.backtrack(i, j - 1, index + 1)
        
        self.board[i][j] = tempValueHolder
        return found
    
# Test Code
solution = Solution()
print(solution.exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCCED")) # Expect True
print(solution.exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "SEE")) # Expect True
print(solution.exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCB")) # Expect False
