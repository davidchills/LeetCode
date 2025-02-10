<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function runningSum($nums) {
        $ans = [];
		$lastSum = 0;
		foreach ($nums as $num) {
			$lastSum += $num;
			$ans[] = $lastSum;
		}
		return $ans;
    }
}
$s = new Solution();
print_r($s->runningSum([3,1,2,10,1]));
?>