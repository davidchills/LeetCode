<?php
/*
The n-queens puzzle is the problem of placing n queens on an n x n chessboard such that no two queens attack each other.
Given an integer n, return the number of distinct solutions to the n-queens puzzle.
*/
class Solution {

    /**
     * 52. N-Queens II
     * @param Integer $n
     * @return Integer
     */
    function totalNQueens($n) {
        $count = 0;
        $this->backtrack(0, $n, [], [], [], $count);
        return $count;
    }
    
    private function backtrack(int $row, int $n, array $cols, array $diag1, array $diag2, int &$count): void {
        if ($row === $n) {
            $count++;
            return;
        }

        for ($col = 0; $col < $n; $col++) {
            $d1 = $row - $col + $n;
            $d2 = $row + $col;
            if (isset($cols[$col]) || isset($diag1[$d1]) || isset($diag2[$d2])) {
                continue; 
            }

            $cols[$col] = true;
            $diag1[$d1] = true;
            $diag2[$d2] = true;

            $this->backtrack($row + 1, $n, $cols, $diag1, $diag2, $count);

            unset($cols[$col]);
            unset($diag1[$d1]);
            unset($diag2[$d2]);
        }
    }    
}

$c = new Solution;
print_r($c->totalNQueens(4)); // Expect 2
//print_r($c->totalNQueens(1)); // Expect 1

?>