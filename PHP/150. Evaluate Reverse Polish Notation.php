<?php
class Solution {

    /**
     * 150. Evaluate Reverse Polish Notation
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens) {
        $stack = [];
        foreach($tokens as $token) {
            switch ($token) { 
                case '+':
                    $stack[] = array_pop($stack) + array_pop($stack);
                    break;
                case '-':
                    $b = array_pop($stack);
                    $a = array_pop($stack);
                    $stack[] = $a - $b;
                    break;
                case '*':
                    $stack[] = array_pop($stack) * array_pop($stack);
                    break;
                case '/':
                    $b = array_pop($stack);
                    $a = array_pop($stack);
                    $stack[] = intval($a / $b);
                    break;  
                default:
                    $stack[] = intval($token);
            }
        }
        return $stack[0];
    }
}

$c = new Solution;
//print_r($c->evalRPN(["2","1","+","3","*"])); // Expect 9
//print_r($c->evalRPN(["4","13","5","/","+"])); // Expect 6
//print_r($c->evalRPN(["10","6","9","3","+","-11","*","/","*","17","+","5","+"])); // Expect 22
print_r($c->evalRPN(["-7","2","/"])); // Expect -3
?>