<?php
class Solution {

    /**
     * 1765. Map of Highest Peak
     * @param Integer[][] $isWater
     * @return Integer[][]
     */
    function highestPeak($isWater) {
        $m = count($isWater);
        $n = count($isWater[0]);
    
        $height = array_fill(0, $m, array_fill(0, $n, -1)); // Initialize height matrix
        $queue = new SplQueue(); // BFS queue
        $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]]; // North, East, South, West
    
        // Initialize the queue with all water cells
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($isWater[$i][$j] == 1) {
                    $height[$i][$j] = 0;
                    $queue->enqueue([$i, $j]); // Add water cells to the queue
                }
            }
        }
    
        // BFS to assign heights
        while (!$queue->isEmpty()) {
            [$x, $y] = $queue->dequeue();
    
            foreach ($directions as [$dx, $dy]) {
                $newX = $x + $dx;
                $newY = $y + $dy;
    
                // Check bounds and if the cell is not yet visited
                if ($newX >= 0 && $newX < $m && $newY >= 0 && $newY < $n && $height[$newX][$newY] == -1) {
                    $height[$newX][$newY] = $height[$x][$y] + 1;
                    $queue->enqueue([$newX, $newY]); // Add the new cell to the queue
                }
            }
        }
    
        return $height;     
    }
}

$c = new Solution;
//print_r($c->highestPeak([[0,1],[0,0]])); // Expect [[1,0],[2,1]]
print_r($c->highestPeak([[0,0,1],[1,0,0],[0,0,0]])); // Expect [[1,1,0],[0,1,1],[1,2,2]]
?>