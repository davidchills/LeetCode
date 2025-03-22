<?php
/*
Given a string containing digits from 2-9 inclusive, return all possible letter combinations that the number could represent. 
    Return the answer in any order.
A mapping of digits to letters (just like on the telephone buttons) is given below. Note that 1 does not map to any letters.
*/
class Solution {

    /**
     * 17. Letter Combinations of a Phone Number
     * @param String $digits
     * @return String[]
     */
    private $buttonMap = [];
    function letterCombinations($digits) {
        if ($digits === "" || $digits === "1") { return []; }
        $this->buttonMap = [
            "2" => ["a", "b", "c"],
            "3" => ["d", "e", "f"],
            "4" => ["g", "h", "i"],
            "5" => ["j", "k", "l"],
            "6" => ["m", "n", "o"],
            "7" => ["p", "q", "r", "s"],
            "8" => ["t", "u", "v"],
            "9" => ["w", "x", "y", "z"]
        ];
        $result = [];
        $this->backtrack($digits, 0, "", $result);
        return $result;
    }
    
    private function backtrack(string $digits, int $index, string $currentCombination, array &$result) {
        if ($index === strlen($digits)) {
            $result[] = $currentCombination;
            return;
        }
        $digit = $digits[$index];
        if (!isset($this->buttonMap[$digit])) return;
        foreach ($this->buttonMap[$digit] as $letter) {
            $this->backtrack($digits, $index + 1, $currentCombination . $letter, $result);
        }
    }    
}

$c = new Solution;
print_r($c->letterCombinations("23")); // Expect ["ad","ae","af","bd","be","bf","cd","ce","cf"]
//print_r($c->letterCombinations("")); // Expect []
//print_r($c->letterCombinations("2")); // Expect ["a","b,"c"]

?>