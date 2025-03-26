<?php
/*
Given n pairs of parentheses, write a function to generate all combinations of well-formed parentheses.
*/
class Solution {

    /**
     * 22. Generate Parentheses
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $result = [];
        $this->backtrack("", 0, 0, $n, $result);
        return $result;
    }

    private function backtrack(string $current, int $open, int $close, int $max, array &$result): void {
        if (strlen($current) === $max * 2) {
            $result[] = $current;
            return;
        }

        if ($open < $max) {
            $this->backtrack($current . "(", $open + 1, $close, $max, $result);
        }

        if ($close < $open) {
            $this->backtrack($current . ")", $open, $close + 1, $max, $result);
        }
    }
}

$c = new Solution;
print_r($c->generateParenthesis(3)); // Expect ["((()))","(()())","(())()","()(())","()()()"]
//print_r($c->generateParenthesis(1)); // Expect ["()"]

?>