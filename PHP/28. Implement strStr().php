<?php
class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr(string $haystack, string $needle):int {
		/*
		if ($needle == '') { return 0; }
		$pos = strpos($haystack, $needle);
		$index = ($pos === false) ? -1 : $pos;
		return $index;
		*/
        if(strlen($needle) == 0) return 0;
        $index = strpos($haystack, $needle);
        return $index === false?-1:$index;	
    }
}
$s = new Solution();
print $s->strStr('ss', '');
?>