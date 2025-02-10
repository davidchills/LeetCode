<?php
// 134. Gas Station
class Solution {

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost) {
        $kount = count($gas);
		$totalGas = 0;
		$totalCost = 0;
		$tank = 0;
		$startIndex = 0;
		for ($i = 0; $i < $kount; $i++) {
			$totalGas += $gas[$i];
			$totalCost += $cost[$i];
			$tank += $gas[$i] - $cost[$i];
			if ($tank < 0) {
				$startIndex = $i + 1;
				$tank = 0;
			}
		}
		return $totalGas >= $totalCost ? $startIndex : -1;
    }
}
$c = new Solution;
print_r($c->canCompleteCircuit([1,2,3,4,5], [3,4,5,1,2]));
?>