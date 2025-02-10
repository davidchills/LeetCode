<?php
class Solution {

    /**
     * 205. Isomorphic Strings
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t) {
        if (strlen($s) !== strlen($t)) { return false; }
    
        $StoT = []; // Map from s to t
        $TtoS = []; // Map from t to s
    
        for ($i = 0; $i < strlen($s); $i++) {
            $sChar = $s[$i];
            $tChar = $t[$i];
    
            // Check mapping from s to t
            if (isset($StoT[$sChar])) {
                if ($StoT[$sChar] !== $tChar) {
                    return false;
                }
            } 
            else { $StoT[$sChar] = $tChar; }
    
            // Check mapping from t to s
            if (isset($TtoS[$tChar])) {
                if ($TtoS[$tChar] !== $sChar) {
                    return false;
                }
            } 
            else { $TtoS[$tChar] = $sChar; }
        }
    
        return true; 
    }
}

$c = new Solution;
//print_r($c->isIsomorphic("egg", "add")); // Expect true
//print_r($c->isIsomorphic("foo", "bar")); // Expect false
//print_r($c->isIsomorphic("paper", "title")); // Expect true
print_r($c->isIsomorphic("bbbaaaba", "aaabbbba")); // Expect false
?>