<?php
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome(int $x):bool {
        $orig_x = $x;
		$mod_x = 0;
		while ($x > 0) {
			$mod_x = ($mod_x * 10) + ($x % 10);
			$x = floor($x / 10);
		}
		return $orig_x == $mod_x;
    }
}	
$s = new Solution();
print ($s->isPalindrome(121)) ? 'TRUE' : 'FALSE';
?>