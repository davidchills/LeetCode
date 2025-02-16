<?php
/*
For two strings s and t, we say "t divides s" if and only if s = t + t + t + ... + t + t (i.e., t is concatenated with itself one or more times).

Given two strings str1 and str2, return the largest string x such that x divides both str1 and str2.
*/
class Solution {

    /**
     * 1071. Greatest Common Divisor of Strings
     * @param String $str1
     * @param String $str2
     * @return String
     */
    public function gcdOfStrings(string $str1, string $str2): string {
        if ($str1.$str2 !== $str2.$str1) { return ""; }
        $n1 = strlen($str1);
        $n2 = strlen($str2);
        $gcd = $this->gcd($n1, $n2);
        return substr($str1, 0, $gcd);
    }
    
    private function gcd(int $num1, int $num2): int {
        while ($num2 !== 0) {
            $tmp = $num2;
            $num2 = $num1 % $num2; 
            $num1 = $tmp;
        }
        return $num1;
    }
}

$c = new Solution;
//print_r($c->gcdOfStrings("ABCABC", "ABC")); // Expect "ABC"
//print_r($c->gcdOfStrings("ABABAB", "ABAB")); // Expect "AB"
print_r($c->gcdOfStrings("LEET", "CODE")); // Expect ""
?>