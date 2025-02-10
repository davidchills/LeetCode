<?php
class Solution {

    /**
     * 1368. Minimum Cost to Make at Least One Valid Path in a Grid
     * @param Integer[][] $grid
     * @return Integer
     */
    function minCost($grid) {
        $m = count($grid);
        $n = count($grid[0]);
        $directions = [
            1 => [0, 1],  // Right
            2 => [0, -1], // Left
            3 => [1, 0],  // Down
            4 => [-1, 0]  // Up
        ];
    
        // Priority queue for BFS
        $queue = new SplPriorityQueue();
        $queue->insert([0, 0, 0], 0); // [row, col, cost], priority = cost
    
        // Visited set to avoid revisiting
        $visited = array_fill(0, $m, array_fill(0, $n, false));
    
        while (!$queue->isEmpty()) {
            [$row, $col, $cost] = $queue->extract();
    
            // If already visited, skip
            if ($visited[$row][$col]) { continue; }
    
            // Mark as visited
            $visited[$row][$col] = true;
    
            // If we've reached the bottom-right cell
            if ($row === $m - 1 && $col === $n - 1) { return $cost; }
    
            // Explore all neighbors
            foreach ($directions as $sign => [$dr, $dc]) {
                $newRow = $row + $dr;
                $newCol = $col + $dc;
    
                // Check bounds
                if ($newRow >= 0 && $newRow < $m && $newCol >= 0 && $newCol < $n) {
                    // If moving in the indicated direction, cost = 0
                    if ($grid[$row][$col] == $sign) {
                        $queue->insert([$newRow, $newCol, $cost], -$cost);
                    } 
                    else {
                        // Otherwise, modify the direction (cost = 1)
                        $queue->insert([$newRow, $newCol, $cost + 1], -($cost + 1));
                    }
                }
            }
        }
        return -1; // Should not reach here
    }
}

$c = new Solution;
print_r($c->minCost([[1,2],[4,3]]));
?>