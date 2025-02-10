<?php
class Solution {

    /**
     * 1267. Count Servers that Communicate
     * @param Integer[][] $grid
     * @return Integer
     */
    function countServers($grid) {
        $rowLength = count($grid);
        $colLength = count($grid[0]);
        $rowCount = array_fill(0, $rowLength, 0);
        $colCount = array_fill(0, $colLength, 0);
        $servers = 0;
        
        for ($i = 0; $i < $rowLength; $i++) {
            for ($j = 0; $j < $colLength; $j++) {
                if ($grid[$i][$j] === 1) {
                    $rowCount[$i]++;
                    $colCount[$j]++;
                }
            }
        }
        
        for ($i = 0; $i < $rowLength; $i++) {
            for ($j = 0; $j < $colLength; $j++) {
                if ($grid[$i][$j] == 1 && ($rowCount[$i] > 1 || $colCount[$j] > 1)) {
                    $servers++;
                }
            }
        }        
        return $servers;
    }
}

$c = new Solution;
//print_r($c->countServers([[1,0],[0,1]])); // Expect 0
//print_r($c->countServers([[1,0],[1,1]])); // Expect 3
print_r($c->countServers([[1,1,0,0],[0,0,1,0],[0,0,1,0],[0,0,0,1]])); // Expect 4
?>