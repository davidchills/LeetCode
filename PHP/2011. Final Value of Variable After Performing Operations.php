<?php
class Solution {

    /**
     * @param String[] $operations
     * @return Integer
     */
    function finalValueAfterOperations($operations) {
        $X = 0;
		foreach($operations as $operate) {
			if ($operate == '--X' || $operate == 'X--') { $X = $X - 1; }
			else $X = $X + 1;
		}
		return $X;
    }
}	
$s = new Solution();
print $s->finalValueAfterOperations(["X++","++X","--X","X--"]);
?>