<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
		$numsLength = count($nums);
		if ($numsLength == 0) { return 0; }
		$i = 0;
		for ($x = 1; $x < $numsLength; $x++) {
			if ($nums[$x] != $nums[$i]) {
				$i++;
				$nums[$i] = $nums[$x];
			}
		}
		return $i + 1;        
    }
}
//$nums = [1,1,2];
$nums = [0,0,1,1,1,2,2,3,3,4];
$s = new Solution();
print $s->removeDuplicates($nums)."\n";
print_r($nums);
?>