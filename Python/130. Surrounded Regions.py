"""
You are given an m x n matrix board containing letters 'X' and 'O', capture regions that are surrounded:
Connect: A cell is connected to adjacent cells horizontally or vertically.
Region: To form a region connect every 'O' cell.
Surround: The region is surrounded with 'X' cells if you can connect the region with 'X' cells 
    and none of the region cells are on the edge of the board.
To capture a surrounded region, replace all 'O's with 'X's in-place within the original board. You do not need to return anything.
"""
# 130. Surrounded Regions
class Solution:
    def solve(self, board: list[list[str]]) -> None:
        """
        Do not return anything, modify board in-place instead.
        """
        rows = len(board)
        cols = len(board[0])
        if rows == 0 or cols == 0:
            return
        
        for i in range(rows):
            self.dfs(board, i, 0)
            self.dfs(board, i, cols - 1)
        for j in range(cols):
            self.dfs(board, 0, j)
            self.dfs(board, rows - 1, j)
            
        for i in range(rows):
            for j in range(cols):
                if board[i][j] == 'O':
                    board[i][j] = 'X'
                elif board[i][j] == '#':
                    board[i][j] = 'O'
                    
    def dfs(self, board, i, j):
        rows = len(board)
        cols = len(board[0])
        
        if i < 0 or i >= rows or j < 0 or j >= cols or board[i][j] != 'O':
            return
        
        board[i][j] = '#'
        
        self.dfs(board, i + 1, j)
        self.dfs(board, i - 1, j)
        self.dfs(board, i, j + 1)
        self.dfs(board, i, j - 1)
        
    
# Test Code
solution = Solution()
#board = [["X","X","X","X"],["X","O","O","X"],["X","X","O","X"],["X","O","X","X"]] # Expect [["X","X","X","X"],["X","X","X","X"],["X","X","X","X"],["X","O","X","X"]]
board = [["X"]] # Expect [["X"]]
solution.solve(board)
print(board)