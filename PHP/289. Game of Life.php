<?php
class Solution {

    /**
     * 289. Game of Life
     * @param Integer[][] $board
     * @return NULL
     */
    // Totally used AI on this one. I really didn't understand having to check so many neighbors. 
    function gameOfLife(&$board) {
        if (empty($board) || empty($board[0])) {
            return;
        }
        $rows = count($board);
        $cols = count($board[0]);
        
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $liveNeighbors = $this->countLiveNeighbors($board, $i, $j, $rows, $cols);
                
                if ($board[$i][$j] === 1) {
                    // Live cell rules
                    if ($liveNeighbors < 2 || $liveNeighbors > 3) {
                        $board[$i][$j] = 3; // Will die
                    }
                } 
                else {
                    // Dead cell rules
                    if ($liveNeighbors === 3) {
                        $board[$i][$j] = 2; // Will become alive
                    }
                }
            }
        }
        
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($board[$i][$j] === 2) {
                    $board[$i][$j] = 1;
                } 
                else if ($board[$i][$j] === 3) {
                    $board[$i][$j] = 0;
                }
            }
        }
        
    }
    
    /**
     * Count live neighbors for a cell
     * @param array $board The game board
     * @param int $row Current row
     * @param int $col Current column
     * @param int $rows Total rows
     * @param int $cols Total columns
     * @return int Number of live neighbors
     */
    private function countLiveNeighbors(array $board, int $row, int $col, int $rows, int $cols): int {
        $directions = [
            [-1, -1], [-1, 0], [-1, 1],
            [0, -1],           [0, 1],
            [1, -1],  [1, 0],  [1, 1]
        ];
        
        $liveNeighbors = 0;
        
        foreach ($directions as [$dx, $dy]) {
            $newRow = $row + $dx;
            $newCol = $col + $dy;
            
            if ($newRow >= 0 && $newRow < $rows && 
                $newCol >= 0 && $newCol < $cols) {
                // Count cells that are either 1 (live) or 3 (about to die)
                if ($board[$newRow][$newCol] === 1 || 
                    $board[$newRow][$newCol] === 3) {
                    $liveNeighbors++;
                }
            }
        }
        
        return $liveNeighbors;
    }
    
}

$c = new Solution;
//$board = [[0,1,0],[0,0,1],[1,1,1],[0,0,0]]; // Expect [[0,0,0],[1,0,1],[0,1,1],[0,1,0]]
$board = [[1,1],[1,0]]; // Expect [[1,1],[1,1]]
$c->gameOfLife($board);
print_r($board);
?>