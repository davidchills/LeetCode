<?php
/*
You are given an m x n matrix board containing letters 'X' and 'O', capture regions that are surrounded:
Connect: A cell is connected to adjacent cells horizontally or vertically.
Region: To form a region connect every 'O' cell.
Surround: The region is surrounded with 'X' cells if you can connect the region with 'X' cells 
    and none of the region cells are on the edge of the board.
To capture a surrounded region, replace all 'O's with 'X's in-place within the original board. You do not need to return anything.
*/
class Solution {

    /**
     * 130. Surrounded Regions
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board) {
        $rows = count($board);
        $cols = count($board[0]);
        if ($rows === 0 || $cols === 0) { return; }
        
        for ($i = 0; $i < $rows; $i++) {
            $this->dfs($board, $i, 0);
            $this->dfs($board, $i, $cols - 1);
        }
        for ($j = 0; $j < $cols; $j++) {
            $this->dfs($board, 0, $j);         // First row
            $this->dfs($board, $rows - 1, $j); // Last row
        }
    
        // Step 2: Convert remaining 'O's to 'X' and safe 'O's (marked as '#') back to 'O'
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($board[$i][$j] == 'O') {
                    $board[$i][$j] = 'X';  // Surrounded regions
                } 
                elseif ($board[$i][$j] == '#') {
                    $board[$i][$j] = 'O';  // Restore boundary connected 'O's
                }
            }
        } 
    }
    
    private function dfs(&$board, $i, $j) {
        $rows = count($board);
        $cols = count($board[0]);
    
        // If out of bounds or not an 'O', return
        if ($i < 0 || $i >= $rows || $j < 0 || $j >= $cols || $board[$i][$j] != 'O') {
            return;
        }
    
        // Mark as safe by changing 'O' to '#'
        $board[$i][$j] = '#';
    
        // Explore all 4 directions (up, down, left, right)
        $this->dfs($board, $i + 1, $j);
        $this->dfs($board, $i - 1, $j);
        $this->dfs($board, $i, $j + 1);
        $this->dfs($board, $i, $j - 1);
    }        
}
function printBoard($board) {
    foreach ($board as $row) {
        echo implode(" ", $row) . "\n";
    }
    echo "\n";
}
$c = new Solution;
//$board = [["X","X","X","X"],["X","O","O","X"],["X","X","O","X"],["X","O","X","X"]]; // Expect [["X","X","X","X"],["X","X","X","X"],["X","X","X","X"],["X","O","X","X"]]
$board = [["X"]]; // Expect [["X"]]
$c->solve($board);

printBoard($board);
?>