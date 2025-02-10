<?php
class Solution {

    /**
     * 73. Set Matrix Zeroes
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
/*        
        // This is the faster but more space solution.
        // Time Complexity: O(m × n)
        // Space Complexity: O(m + n)        
        $numberOfRows = count($matrix);
        $numberOfColumns = count($matrix[0]);
        $changeRows = [];
        $changeColumns = [];
   
        for ($i = 0; $i < $numberOfRows; $i++) {
            for ($j = 0; $j < $numberOfColumns; $j++) {
                if ($matrix[$i][$j] === 0) {
                    $changeRows[$i] = $i;
                    $changeColumns[$j] = $j;
                }
            }
        }

        foreach($changeRows as $id) {
            for ($i = 0; $i < $numberOfColumns; $i++) {
                $matrix[$id][$i] = 0;
            }
        }
        
        foreach($changeColumns as $id) {
            for ($i = 0; $i < $numberOfRows; $i++) {
                $matrix[$i][$id] = 0;
            }
        }
*/
        // This is the slower but no additional space solution/
        $numberOfRows = count($matrix);
        $numberOfColumns = count($matrix[0]);
        $firstRowZero = false;
        $firstColZero = false;        
        for ($i = 0; $i < $numberOfColumns; $i++) {
            if ($matrix[0][$i] === 0) {
                $firstRowZero = true;
                break;
            }
        }
        
        for ($i = 0; $i < $numberOfRows; $i++) {
            if ($matrix[$i][0] === 0) {
                $firstColZero = true;
                break;
            }
        }   
        
        for ($i = 1; $i < $numberOfRows; $i++) {
            for ($j = 1; $j < $numberOfColumns; $j++) {
                if ($matrix[$i][$j] === 0) {
                    $matrix[$i][0] = 0;
                    $matrix[0][$j] = 0;
                }
            }
        } 
        
        for ($i = 1; $i < $numberOfRows; $i++) {
            for ($j = 1; $j < $numberOfColumns; $j++) {
                if ($matrix[$i][0] === 0 || $matrix[0][$j] === 0) {
                    $matrix[$i][$j] = 0;
                }
            }
        }  
        
        if ($firstRowZero) {
            //$matrix[0] = array_fill(0, $numberOfColumns, 0);
            for ($i = 0; $i < $numberOfColumns; $i++) {
                $matrix[0][$i] = 0;
            }
        }
        
        if ($firstColZero) {
            for ($i = 0; $i < $numberOfRows; $i++) {
                $matrix[$i][0] = 0;
            }
        }        
    }
}

$c = new Solution;
$matrix = [[1,1,1],[1,0,1],[1,1,1]]; // Expect [[1,0,1],[0,0,0],[1,0,1]]
//$matrix = [[0,1,2,0],[3,4,5,2],[1,3,1,5]]; // Expect [[0,0,0,0],[0,4,5,0],[0,3,1,0]]
$c->setZeroes($matrix);
print_r($matrix);
?>