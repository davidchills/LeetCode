<?php
class PriorityQueue extends SplPriorityQueue {
    public function compare(mixed $priority1, mixed $priority2): int {
        return $priority2 <=> $priority1; // Min-heap: smaller height has higher priority
    }
}
    
class Solution {

    /**
     * 407. Trapping Rain Water II
     * @param Integer[][] $heightMap
     * @return Integer
     */
    function trapRainWater($heightMap) {
        $m = count($heightMap);
        $n = count($heightMap[0]);
    
        if ($m < 3 || $n < 3) {
            return 0; // Not enough space to trap water
        }
    
        $visited = array_fill(0, $m, array_fill(0, $n, false));
        $pq = new PriorityQueue();
        $water = 0;
    
        // Add all boundary cells to the priority queue
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i == 0 || $i == $m - 1 || $j == 0 || $j == $n - 1) {
                    $pq->insert([$i, $j, $heightMap[$i][$j]], $heightMap[$i][$j]);
                    $visited[$i][$j] = true;
                }
            }
        }
        // Directions for moving to neighbors
        $directions = [[0, 1], [0, -1], [1, 0], [-1, 0]];
    
        // Process the priority queue
        while (!$pq->isEmpty()) {
            [$row, $col, $currentHeight] = $pq->extract();
            foreach ($directions as [$dr, $dc]) {
                $newRow = $row + $dr;
                $newCol = $col + $dc;
                if ($newRow >= 0 && $newRow < $m && $newCol >= 0 && $newCol < $n && !$visited[$newRow][$newCol]) {
                    $visited[$newRow][$newCol] = true;
    
                    // Calculate water trapped
                    $newHeight = $heightMap[$newRow][$newCol];
                    $water += max(0, $currentHeight - $newHeight);
                    // Add the neighbor cell to the queue with the updated height
                    $pq->insert([$newRow, $newCol, max($currentHeight, $newHeight)], max($currentHeight, $newHeight));
                }
            }
        }
        return $water;        
    }
}

$c = new Solution;
print_r($c->trapRainWater([[3,3,3,3,3],[3,2,2,2,3],[3,2,1,2,3],[3,2,2,2,3],[3,3,3,3,3]]));
?>