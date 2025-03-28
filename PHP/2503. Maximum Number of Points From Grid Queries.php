<?php
/*
You are given an m x n integer matrix grid and an array queries of size k.
Find an array answer of size k such that for each integer queries[i] you start in the top left cell of the matrix 
    and repeat the following process:
If queries[i] is strictly greater than the value of the current cell that you are in, 
    then you get one point if it is your first time visiting this cell, 
    and you can move to any adjacent cell in all 4 directions: up, down, left, and right.
Otherwise, you do not get any points, and you end this process.
After the process, answer[i] is the maximum number of points you can get. 
    Note that for each query you are allowed to visit the same cell multiple times.
Return the resulting array answer.
*/
class Solution {

    /**
     * 2503. Maximum Number of Points From Grid Queries
     * @param Integer[][] $grid
     * @param Integer[] $queries
     * @return Integer[]
     */
    function maxPoints($grid, $queries) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $DIRECTIONS = [[0,1], [1,0], [0,-1], [-1,0]];        
        $sorted_queries = [];
        foreach ($queries as $idx => $val) {
            $sorted_queries[] = [$val, $idx];
        }
        usort($sorted_queries, fn($a, $b) => $a[0] <=> $b[0]);
        $result = array_fill(0, count($queries), 0);

        $heap = new SplPriorityQueue();
        $heap->insert([0, 0], -$grid[0][0]);
        $visited = array_fill(0, $rows, array_fill(0, $cols, false));
        $visited[0][0] = true;
        $points = 0;

        foreach ($sorted_queries as [$query_val, $query_idx]) {
            while (!$heap->isEmpty()) {
                $top = $heap->top();
                $priority = -$heap->getExtractFlags();
                [$r, $c] = $heap->extract();
                $cell_val = $grid[$r][$c];
                if ($cell_val >= $query_val) {
                    $heap->insert([$r, $c], -$cell_val);
                    break;
                }
                $points++;
                foreach ($DIRECTIONS as [$dr, $dc]) {
                    $nr = $r + $dr;
                    $nc = $c + $dc;
                    if ($nr >= 0 && $nr < $rows && $nc >= 0 && $nc < $cols && !$visited[$nr][$nc]) {
                        $visited[$nr][$nc] = true;
                        $heap->insert([$nr, $nc], -$grid[$nr][$nc]);
                    }
                }
            }
            $result[$query_idx] = $points;
        }
        return $result;
    }   
}

$c = new Solution;
print_r($c->maxPoints([[1,2,3],[2,5,7],[3,5,1]], [5,6,2])); // Expect [5,8,1]
print "\n";
print_r($c->maxPoints([[5,2,1],[1,1,2]], [3])); // Expect [0]

?>