<?php
/*
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
*/
class Solution {

    /**
     * 909. Snakes and Ladders
     * @param Integer[][] $board
     * @return Integer
     */
    function snakesAndLadders($board) {
        $n = count($board);
        $flattenedBoard = $this->flattenBoard($board, $n);
        $queue = [[1, 0]];
        $visited = array_fill(1, $n * $n, false);
        $visited[1] = true;
        while (!empty($queue)) {
            list($pos, $moves) = array_shift($queue);
            if ($pos == $n * $n) { return $moves; }
            for ($dice = 1; $dice <= 6; $dice++) {
                $nextPos = $pos + $dice;
                if ($nextPos > $n * $n) { break; }
                    if ($flattenedBoard[$nextPos] != -1) {
                    $nextPos = $flattenedBoard[$nextPos];
                }
                if (!$visited[$nextPos]) {
                    $visited[$nextPos] = true;
                    $queue[] = [$nextPos, $moves + 1];
                }
            }
        }
        return -1;       
    }
    
    private function flattenBoard($board, $n) {
        $flattened = array_fill(1, $n * $n, -1);
        $idx = 1;
        for ($row = $n - 1; $row >= 0; $row--) {
            if (($n - 1 - $row) % 2 == 0) {
                for ($col = 0; $col < $n; $col++) {
                    if ($board[$row][$col] != -1) {
                        $flattened[$idx] = $board[$row][$col];
                    }
                    $idx++;
                }
            } 
            else {
                for ($col = $n - 1; $col >= 0; $col--) {
                    if ($board[$row][$col] != -1) {
                        $flattened[$idx] = $board[$row][$col];
                    }
                    $idx++;
                }
            }
        }
        return $flattened;
    }    
}

$c = new Solution;
//print_r($c->snakesAndLadders([[-1,-1,-1,-1,-1,-1],[-1,-1,-1,-1,-1,-1],[-1,-1,-1,-1,-1,-1],[-1,35,-1,-1,13,-1],[-1,-1,-1,-1,-1,-1],[-1,15,-1,-1,-1,-1]])); // Expect 4
print_r($c->snakesAndLadders([[-1,-1],[-1,3]])); // Expect 1

?>