<?php
class Solution {

    /**
     * 3160. Find the Number of Distinct Colors Among the Balls
     * @param Integer $limit
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function queryResults($limit, $queries) {
        $colorMap = []; // Stores the color of each ball
        $colorCount = []; // Tracks occurrences of each color
        $result = [];
    
        foreach ($queries as $query) {
            list($x, $y) = $query;
    
            // If the ball was previously colored, decrease its old color count
            if (isset($colorMap[$x])) {
                $oldColor = $colorMap[$x];
                $colorCount[$oldColor]--;
    
                // Remove color from tracking if no more balls have this color
                if ($colorCount[$oldColor] == 0) {
                    unset($colorCount[$oldColor]);
                }
            }
    
            // Update the ball's color
            $colorMap[$x] = $y;
            
            // Increase the new color's count
            if (!isset($colorCount[$y])) {
                $colorCount[$y] = 0;
            }
            $colorCount[$y]++;
    
            // Store the count of distinct colors
            $result[] = count($colorCount);
        }
    
        return $result;      
    }
}

$c = new Solution;
//print_r($c->queryResults(4, [[1,4],[2,5],[1,3],[3,4]])); // Expect [1,2,2,3]
//print_r($c->queryResults(4, [[0,1],[1,2],[2,2],[3,4],[4,5]])); // Expect [1,2,2,3,4]
print_r($c->queryResults(1, [[0,1],[1,4],[1,1],[1,4],[1,1]])); // Expect [1,2,1,2,1]
?>