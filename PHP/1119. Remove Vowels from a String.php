<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeVowels($s) {
        return preg_replace('/[aeiou]/', '', $s);
    }
}
$s = new Solution();
print $s->removeVowels("bcd");
?>