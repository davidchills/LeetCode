<?php
class Solution {

    /**
     * @param String $jewels
     * @param String $stones
     * @return Integer
     */
    function numJewelsInStones($jewels, $stones) {
        $num = 0;
		$ja = str_split($jewels);
		$sa = str_split($stones);
		$stoneCount = array_count_values($sa);
		foreach ($ja as $jewel) {
			if (isset($stoneCount[$jewel])) { $num += $stoneCount[$jewel]; }
		}
		return $num;
    }
}
$s = new Solution();
print $s->numJewelsInStones("z", "ZZ");
?>