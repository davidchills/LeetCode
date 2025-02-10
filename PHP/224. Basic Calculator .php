<?php
class Solution {

    /**
     * 224. Basic Calculator
     * @param String $s
     * @return Integer
     */
    function calculate($s) {
        $stack = new SplStack(); // Stack to store previous results and signs
        $num = 0;
        $sign = 1; // 1 for '+', -1 for '-'
        $result = 0;
    
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
    
            if (ctype_digit($char)) {
                $num = $num * 10 + (int)$char; // Build full number
            } 
            elseif ($char == '+') {
                $result += $sign * $num;
                $num = 0;
                $sign = 1;
            } 
            elseif ($char == '-') {
                $result += $sign * $num;
                $num = 0;
                $sign = -1;
            } 
            elseif ($char == '(') {
                // Push current result and sign onto stack before processing sub-expression
                $stack->push($result);
                $stack->push($sign);
                $result = 0;
                $sign = 1;
            } 
            elseif ($char == ')') {
                $result += $sign * $num;
                $num = 0;
                // Pop sign and previous result from stack
                $result *= $stack->pop(); // Apply the sign before '('
                $result += $stack->pop(); // Add previous result before '('
            }
        }
        
        return $result + ($sign * $num); // Add last number if exists       
    }
}

$c = new Solution;
print_r($c->calculate("1 + 1")); // Expect 2
//print_r($c->calculate(" 2-1 + 2 ")); // Expect 3
//print_r($c->calculate("(1+(4+5+2)-3)+(6+8)")); // Expect 23
?>