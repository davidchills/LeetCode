<?php
class Solution {

    /**
     * 6. Zigzag Conversion
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if ($numRows == 1 || strlen($s) <= $numRows) {
            return $s; // No zigzag needed
        }
    
        $rows = array_fill(0, min($numRows, strlen($s)), ""); // Initialize rows
        $currentRow = 0; // Track the current row
        $goingDown = false; // Direction flag
    
        // Traverse the string and fill rows
        for ($i = 0; $i < strlen($s); $i++) {
            $rows[$currentRow] .= $s[$i];
    
            // Change direction at the top or bottom
            if ($currentRow == 0 || $currentRow == $numRows - 1) {
                $goingDown = !$goingDown;
            }
    
            // Update the current row
            $currentRow += $goingDown ? 1 : -1;
        }
    
        // Combine all rows
        return implode("", $rows);        
    }
}

$c = new Solution;
print_r($c->convert("PAYPALISHIRING", 3));
?>