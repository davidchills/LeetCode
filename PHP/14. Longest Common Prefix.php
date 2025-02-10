<?php
class Solution {

    /**
	 * 14. Longest Common Prefix
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix(array $strs):string {
        $prefix = "";
		sort($strs, SORT_STRING);
		$first = $strs[0];
		$last = end($strs);
		$length = strlen($first);
		for ($i = 0; $i < $length; $i++) {
			if (substr($first, $i, 1) === substr($last, $i, 1)) {
				$prefix .= substr($first, $i, 1);
			}
			else { return $prefix; }
		}		
		return $prefix;
    }
}
$s = new Solution();
print "'".$s->longestCommonPrefix(["flower","flow","flight"])."'";
?>