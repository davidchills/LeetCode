<?php
class Solution {

    /**
     * 2683. Neighboring Bitwise XOR
     * @param Integer[] $derived
     * @return Boolean
     */
    function doesValidArrayExist($derived) {
        $n = count($derived);
        // Check both possible starting values for original[0]
        return $this->isValid(0, $derived, $n) || $this->isValid(1, $derived, $n);        
    }
    
    function isValid($start, $derived, $n) {
        $original = [$start];
        for ($i = 0; $i < $n - 1; $i++) {
            $original[] = $original[$i] ^ $derived[$i];
        }
        // Check cyclic condition
        return ($original[0] ^ $original[$n - 1]) === $derived[$n - 1];
    }    
}

$c = new Solution;
print_r($c->doesValidArrayExist([1,0]));
?>