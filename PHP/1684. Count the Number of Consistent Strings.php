<?php
class Solution {

    /**
     * @param String $allowed
     * @param String[] $words
     * @return Integer
     */
    function countConsistentStrings($allowed, $words) {
        $found = 0;
		$pattern = '';
		foreach ($words as $word) {
			if (preg_match("/[^{$allowed}]/", $word, $matches)) { continue; }
			else { $found++; }
		}
		return $found;
    }
}
$s = new Solution();
//print $s->countConsistentStrings("ab", ["ad","bd","aaab","baa","badab"]);
//print $s->countConsistentStrings("abc", ["a","b","c","ab","ac","bc","abc"]);
print $s->countConsistentStrings("cad", ["cc","acd","b","ba","bac","bad","ac","d"]);
?>