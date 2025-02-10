<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numIdenticalPairs($nums) {
        $pairs = 0;
		$counted = array_count_values($nums);
		foreach ($counted as $k => $v) {
			$pairs += ($v * ($v - 1) / 2);
		}
		return $pairs;
    }
}
$s = new Solution();
print $s->numIdenticalPairs([1,2,3]);
?>