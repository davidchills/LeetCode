<?php
class Solution {

    /**
     * 20. Valid Parentheses
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $pairs = ['(' => ')', '{' => '}', '[' => ']'];
        $stack = [];
        $n = strlen($s);
        for ($i = 0; $i < $n; $i++) {
            if (in_array($s[$i], ['(','{','['])) { 
                array_push($stack, $s[$i]);
            }
            else {
                $previous = array_pop($stack);
                if ($pairs[$previous] !== $s[$i]) { return false; }
            }
        }
        return (count($stack) === 0) ? true : false;
    }
}

$c = new Solution;
//print_r($c->isValid("()")); // Expect true
//print_r($c->isValid("()[]{}")); // Expect true
//print_r($c->isValid("(]")); // Expect false
//print_r($c->isValid("([])")); // Expect true
print_r($c->isValid("([)]")); // Expect false
?>