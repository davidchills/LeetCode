<?php
class Solution {

    /**
     * 48. Rotate Image
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix) {
        $n = count($matrix);
        
        // Transpose the matrix.
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $temp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$j][$i];
                $matrix[$j][$i] = $temp;
            }
        }
        
        // Reverse each row.
        for ($i = 0; $i < $n; $i++) {
            $matrix[$i] = array_reverse($matrix[$i]);
        }
    }
}

$c = new Solution;
$matrix = [[1,2,3],[4,5,6],[7,8,9]]; // Expect [[7,4,1],[8,5,2],[9,6,3]]
//$matrix = [[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]]; // Expect [[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]]
$c->rotate($matrix);
print_r($matrix);
?>