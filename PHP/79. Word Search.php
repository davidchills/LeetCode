<?php
/*
Given an m x n grid of characters board and a string word, return true if word exists in the grid.
The word can be constructed from letters of sequentially adjacent cells, 
    where adjacent cells are horizontally or vertically neighboring. The same letter cell may not be used more than once.
*/
class Solution {

    /**
     * 79. Word Search
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) {
        $rows = count($board);
        $cols = count($board[0]);

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($this->backtrack($board, $word, $i, $j, 0)) {
                    return true;
                }
            }
        }
        return false;
    }
    

    private function backtrack(array &$board, string $word, int $i, int $j, int $index): bool {
        if ($index === strlen($word)) { return true; }
        if ($i < 0 || $i >= count($board) || $j < 0 || $j >= count($board[0])) { return false; }
        if ($board[$i][$j] !== $word[$index]) { return false; }

        // Temporarily mark as visited
        $tempValueHolder = $board[$i][$j];
        $board[$i][$j] = '#';

        $found = $this->backtrack($board, $word, $i + 1, $j, $index + 1) ||
                 $this->backtrack($board, $word, $i - 1, $j, $index + 1) ||
                 $this->backtrack($board, $word, $i, $j + 1, $index + 1) ||
                 $this->backtrack($board, $word, $i, $j - 1, $index + 1);

        // Backtrack
        $board[$i][$j] = $tempValueHolder;

        return $found;
    }    
}

$c = new Solution;
print_r($c->exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCCED")); // Expect true
//print_r($c->exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "SEE")); // Expect true
//print_r($c->exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCB")); // Expect false

?>