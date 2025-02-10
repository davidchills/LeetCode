<?php
class Solution {

    /**
     * @param String[][] $items
     * @param String $ruleKey
     * @param String $ruleValue
     * @return Integer
     */
    function countMatches($items, $ruleKey, $ruleValue) {
        $matches = 0;
		$keys = array('type' => 0, 'color' => 1, 'name' => 2);
		foreach ($items as $item) {
			if ($item[$keys[$ruleKey]] == $ruleValue) { $matches++; }
		}
		return $matches;
    }
}
$s = new Solution;
print $s->countMatches([["phone","blue","pixel"],["computer","silver","phone"],["phone","gold","iphone"]], 'type', 'phone');
?>