<?php
class Solution {

    /**
     * @param String $address
     * @return String
     */
    function defangIPaddr($address) {
        return preg_replace('/\./', '[.]', $address);
    }
}
$s = new Solution();
print $s->defangIPaddr("255.100.50.0");
?>