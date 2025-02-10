<?php
class Solution {

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies) {
        $mostCandy = max($candies);
		$ans = [];
		foreach ($candies as $candy) {
			$ans[] = (($candy + $extraCandies) >= $mostCandy) ? true : false ;
		}
		return $ans;
    }
}
$s = new Solution();
print_r($s->kidsWithCandies([12,1,12], 10));
?>