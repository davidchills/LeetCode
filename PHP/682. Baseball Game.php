<?php
class Solution {

    /**
     * 682. Baseball Game
     * @param String[] $operations
     * @return Integer
     */
    function calPoints($operations) {
        $n = count($operations);
        $valid = [];
        for ($i = 0; $i < $n; $i++) {
            $validCount = count($valid);
            if (is_numeric($operations[$i])) { $valid[] = (int) $operations[$i]; }
            elseif ($operations[$i] === '+' && $validCount >= 2) {
                $valid[] = ($valid[$validCount-1]+$valid[$validCount-2]);
            }
            elseif ($operations[$i] === 'D' && $validCount >= 1) {
                $valid[] = ($valid[$validCount-1]*2);
            }
            elseif ($operations[$i] === 'C' && $validCount >= 1) {
                array_pop($valid);
            }
        }
        return array_sum($valid);
    }
}

$c = new Solution;
//print_r($c->calPoints(["5","2","C","D","+"])); // Expect 30
//print_r($c->calPoints(["5","-2","4","C","D","9","+","+"])); // Expect 27
print_r($c->calPoints(["1","C"])); // Expect 0
?>