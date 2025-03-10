<?php
/*
Given an m x n 2D binary grid grid which represents a map of '1's (land) and '0's (water), return the number of islands.
An island is surrounded by water and is formed by connecting adjacent lands horizontally or vertically. 
    You may assume all four edges of the grid are all surrounded by water.
*/
class Solution {

    /**
     * 200. Number of Islands
     * @param String[][] $grid
     * @return Integer
     */
    public function numIslands(array $grid): int {
        $islands = 0;
        
        $n1 = count($grid);
        $n2 = count($grid[0]);
        
        for ($i = 0; $i < $n1; $i++) {
            for ($j = 0; $j < $n2; $j++) {
                if ($grid[$i][$j] === '1') {
                    $islands++;
                    $this->dfs($i, $j, $grid);
                }
            }
        }
        return $islands;
    }
    
    private function dfs($row, $col, &$grid) {
        $directions = [[0,1], [0, -1], [1, 0], [-1, 0]];
        if ($row < 0 || $col < 0 || $row >= count($grid) || $col >= count($grid[0]) || $grid[$row][$col] !== '1') {
            return;
        }
        $grid[$row][$col] = '2';
        foreach ($directions as $dir) {
            $this->dfs($row + $dir[0], $col + $dir[1], $grid);
        }
    }
}

$c = new Solution;
/*
print_r($c->numIslands([
  ["1","1","1","1","0"],
  ["1","1","0","1","0"],
  ["1","1","0","0","0"],
  ["0","0","0","0","0"]
])); // Expect 1
*/
/*
print_r($c->numIslands([
  ["1","1","0","0","0"],
  ["1","1","0","0","0"],
  ["0","0","1","0","0"],
  ["0","0","0","1","1"]
])); // Expect 3 
*/
print_r($c->numIslands([
    ["1","1","1"],
    ["0","1","0"],
    ["1","1","1"]
])); // Expect 1     
?>