<?php
class Solution {

    /**
     * 202. Happy Number
     * @param Integer $n
     * @return Boolean
     */
    public function isHappy(int $n): bool {
        $seen = [];

        while ($n !== 1 && !isset($seen[$n])) {
            $seen[$n] = true;
            $n = $this->getSumOfSquares($n);
        }

        return $n === 1;
    }

    /**
     * Helper function to compute the sum of the squares of digits of a number
     * @param Integer $num
     * @return Integer
     */
    private function getSumOfSquares(int $num): int {
        $sum = 0;
        while ($num > 0) {
            $digit = $num % 10;
            $sum += $digit * $digit;
            $num = (int)($num / 10);
        }
        return $sum;
    }
}

$c = new Solution;
//print_r($c->isHappy(19)); // true
print_r($c->isHappy(2)); // false
?>