"""
Write a program to solve a Sudoku puzzle by filling the empty cells.
A sudoku solution must satisfy all of the following rules:
Each of the digits 1-9 must occur exactly once in each row.
Each of the digits 1-9 must occur exactly once in each column.
Each of the digits 1-9 must occur exactly once in each of the 9 3x3 sub-boxes of the grid.
The '.' character indicates empty cells.
"""
# 37. Sudoku Solver
import time
from typing import List
class Solution:
    def solveSudoku(self, board: List[List[str]]) -> None:
        """
        Do not return anything, modify board in-place instead.
        """
        # Pre-compute constraints for faster lookups
        self.rows = [set('123456789') for _ in range(9)]
        self.cols = [set('123456789') for _ in range(9)]
        self.boxes = [set('123456789') for _ in range(9)]
        
        # Initialize constraint sets based on existing numbers
        for i in range(9):
            for j in range(9):
                if board[i][j] != '.':
                    num = board[i][j]
                    self.rows[i].discard(num)
                    self.cols[j].discard(num)
                    self.boxes[self.get_box_index(i, j)].discard(num)
        
        # Call the helper function but don't return anything
        self.solve(board)
    
    def get_box_index(self, row: int, col: int) -> int:
        return (row // 3) * 3 + col // 3
    
    def get_candidates(self, row: int, col: int) -> set[str]:
        box_idx = self.get_box_index(row, col)
        return self.rows[row] & self.cols[col] & self.boxes[box_idx]
    
    def solve(self, board: List[List[str]]) -> bool:
        # Find the empty cell with minimum candidates (MRV heuristic)
        min_candidates = 10
        best_cell = None
        best_candidates = None
        
        for i in range(9):
            for j in range(9):
                if board[i][j] == '.':
                    candidates = self.get_candidates(i, j)
                    if len(candidates) == 0:
                        return False  # No valid candidates, backtrack
                    if len(candidates) < min_candidates:
                        min_candidates = len(candidates)
                        best_cell = (i, j)
                        best_candidates = candidates
                        if min_candidates == 1:
                            break  # Can't get better than 1 candidate
            if min_candidates == 1:
                break
        
        if best_cell is None:
            return True  # All cells filled
        
        row, col = best_cell
        box_idx = self.get_box_index(row, col)
        
        for num in best_candidates:
            # Place the number
            board[row][col] = num
            self.rows[row].discard(num)
            self.cols[col].discard(num)
            self.boxes[box_idx].discard(num)
            
            if self.solve(board):
                return True
            
            # Backtrack
            board[row][col] = '.'
            self.rows[row].add(num)
            self.cols[col].add(num)
            self.boxes[box_idx].add(num)
        
        return False

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
board = [["5","3",".",".","7",".",".",".","."],["6",".",".","1","9","5",".",".","."],[".","9","8",".",".",".",".","6","."],["8",".",".",".","6",".",".",".","3"],["4",".",".","8",".","3",".",".","1"],["7",".",".",".","2",".",".",".","6"],[".","6",".",".",".",".","2","8","."],[".",".",".","4","1","9",".",".","5"],[".",".",".",".","8",".",".","7","9"]]

solution.solveSudoku(board)
print(board) # Expect [["5","3","4","6","7","8","9","1","2"],["6","7","2","1","9","5","3","4","8"],["1","9","8","3","4","2","5","6","7"],["8","5","9","7","6","1","4","2","3"],["4","2","6","8","5","3","7","9","1"],["7","1","3","9","2","4","8","5","6"],["9","6","1","5","3","7","2","8","4"],["2","8","7","4","1","9","6","3","5"],["3","4","5","2","8","6","1","7","9"]]


end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")