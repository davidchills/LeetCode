<?php
class Solution {

    /**
     * @param Integer[][] $accounts
     * @return Integer
     */
    function maximumWealth($accounts) {
        $richest = 0;
		foreach ($accounts as $account) {
			$total = array_sum($account);
			if ($total > $richest) { $richest = $total; }
		}
		return $richest;
		/* Optimal Solution
        $max = -1;
        foreach($accounts as $account) {

            $max = max($max, array_sum($account));
        }
        return $max;
		*/
    }
}
$s = new Solution();
print $s->maximumWealth([[2,8,7],[7,1,3],[1,9,5]]);
?>