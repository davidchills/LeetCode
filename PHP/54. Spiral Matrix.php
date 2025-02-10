<?php
class Solution {

    /**
     * 54. Spiral Matrix
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder(array $matrix) {
        $out = [];

        if (empty($matrix) || empty($matrix[0])) { return $out; }

        $top = 0;
        $bottom = count($matrix) - 1;
        $left = 0;
        $right = count($matrix[0]) - 1;

        while ($top <= $bottom && $left <= $right) {
            // Traverse from left to right along the top row
            for ($i = $left; $i <= $right; $i++) {
                $out[] = $matrix[$top][$i];
            }
            $top++;

            // Traverse from top to bottom along the right column
            for ($i = $top; $i <= $bottom; $i++) {
                $out[] = $matrix[$i][$right];
            }
            $right--;

            // Traverse from right to left along the bottom row (if applicable)
            if ($top <= $bottom) {
                for ($i = $right; $i >= $left; $i--) {
                    $out[] = $matrix[$bottom][$i];
                }
                $bottom--;
            }

            // Traverse from bottom to top along the left column (if applicable)
            if ($left <= $right) {
                for ($i = $bottom; $i >= $top; $i--) {
                    $out[] = $matrix[$i][$left];
                }
                $left++;
            }
        }

        return $out;
    }
}

$c = new Solution;
//print_r($c->spiralOrder([[1,2,3],[4,5,6],[7,8,9]])); // Expect [1,2,3,6,9,8,7,4,5]
print_r($c->spiralOrder([[1,2,3,4],[5,6,7,8],[9,10,11,12]])); // Expect [1,2,3,4,8,12,11,10,9,5,6,7]
?>