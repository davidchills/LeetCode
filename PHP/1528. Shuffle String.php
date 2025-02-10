<?php
class Solution {

    /**
     * @param String $s
     * @param Integer[] $indices
     * @return String
     */
    function restoreString($s, $indices) {
//		$inArr = str_split($s);
//		$ret = [];
//		for ($i = 0; $i < count($indices); $i++) {
//			$ret[] = $inArr[$indices[$i]];
//		}
//		return implode('', $ret);
		
		$res = $s;
		$l = strlen($s);
		for ($i = 0; $i < $l; $i++) {
			$res[$indices[$i]] = $s[$i];
		}
		return $res;		
    }
}
$sol = new Solution();
$s = 'codeleet';
$indices = [4,5,6,7,0,2,1,3];
//$s = 'abc';
//$indices = [0,1,2];
	
print $sol->restoreString($s, $indices);
?>