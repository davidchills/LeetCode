<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function truncateSentence($s, $k) {
        $words = explode(" ", $s);
		return implode(" ", array_slice($words, 0, $k));
    }
}
$sol = new Solution();
//print $sol->truncateSentence("Hello how are you Contestant", 4);
//print $sol->truncateSentence("What is the solution to this problem", 4);
print $sol->truncateSentence("chopper is not a tanuki", 5);
?>