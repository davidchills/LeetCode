<?php
class Solution {

    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function minimizeXor($num1, $num2) {
		$setBitsNum2 = $this->countSetBits($num2);
	
		$x = 0;
	
		for ($i = 31; $i >= 0 && $setBitsNum2 > 0; $i--) {
			if (($num1 & (1 << $i)) != 0) {
				$x |= (1 << $i);
				$setBitsNum2--;
			}
		}
	
		for ($i = 0; $i < 32 && $setBitsNum2 > 0; $i++) {
			if (($x & (1 << $i)) == 0) {
				$x |= (1 << $i);
				$setBitsNum2--;
			}
		}
		return $x;
	}        
	
	function countSetBits($num) {
		$count = 0;
		while ($num > 0) {
			$count += $num & 1;
			$num >>= 1;
		}
		return $count;
	}	
}

$c = new Solution;
print_r($c->minimizeXor(1, 12));
?>