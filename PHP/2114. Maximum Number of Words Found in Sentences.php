<?php
class Solution {

    /**
     * @param String[] $sentences
     * @return Integer
     */
    function mostWordsFound($sentences) {
        $maxWords = 0;
		foreach ($sentences as $sentence) {
			$words = count(explode(' ', $sentence));
			if ($words > $maxWords) { $maxWords = $words; }
		}
		return $maxWords;
    }
}	
$s = new Solution();
print $s->mostWordsFound(["please wait", "continue to fight", "continue to win"]);
?>