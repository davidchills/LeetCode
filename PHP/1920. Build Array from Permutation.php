<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function buildArray($nums) {
        $ans = [];
		for ($i = 0; $i < count($nums); $i++) {
			$ans[] = $nums[$nums[$i]];
		}
		return $ans;
    }
}
$s = new Solution();
print_r($s->buildArray([0,2,1,5,3,4]));
?>