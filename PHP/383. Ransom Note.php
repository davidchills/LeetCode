<?php
class Solution {

    /**
     * 383. Ransom Note
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine) {
        $rv = true;
        $noteLetters = str_split($ransomNote);
        $magazineLetters = str_split($magazine);
        foreach ($noteLetters as $letter) {
            $found = array_search($letter, $magazineLetters, true);
            if ($found !== false) { $magazineLetters[$found] = null; }
            else { return false; }
        }
        return $rv;
    }
}

$c = new Solution;
//print_r($c->canConstruct("a", "b")); // Expect false
//print_r($c->canConstruct("aa", "ab")); // Expect false
print_r($c->canConstruct("aa", "aab")); // Expect true
?>