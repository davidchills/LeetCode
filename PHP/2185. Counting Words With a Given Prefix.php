<?php
class Solution {

    /**
     * @param String[] $words
     * @param String $pref
     * @return Integer
     */
    function prefixCount($words, $pref) {
        /*
		$found = 0;
		foreach ($words as $word) {
			if (preg_match("/^{$pref}.* /", $word)) { $found++; }
		}
		return $found;
		*/
		/*
        $found = 0;
        foreach($words as $word) {
            if (strpos($word, $pref) === 0) {
                $found++;
            }
        }
        return $found;	
		*/
		
        $found = 0;
        foreach ($words as $word) {
            if (substr($word, 0, strlen($pref)) === $pref) {
                $found++;
            }
        }
        return $found;	
		
    }
}
$s = new Solution();
print $s->prefixCount(["pay","attention","practice","attend"], "at");
?>