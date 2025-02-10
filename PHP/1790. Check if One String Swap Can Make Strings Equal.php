<?php
class Solution {

    /**
     * 1790. Check if One String Swap Can Make Strings Equal
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function areAlmostEqual($s1, $s2) {
        if ($s1 === $s2) { return true; }
        $n = strlen($s1);
        $mismatch = [];
        $swaps = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($s1[$i] !== $s2[$i]) {
                $mismatch[] = $i;
                $swaps++;
                if ($swaps > 2) { return false; }
            }
        }
        return ($swaps === 2 && $s1[$mismatch[0]] === $s2[$mismatch[1]] && $s1[$mismatch[1]] === $s2[$mismatch[0]]);
    }
}

$c = new Solution;
print_r($c->areAlmostEqual("bank", "kanb")); // Expect true
//print_r($c->areAlmostEqual("attack", "defend")); // Expect false
//print_r($c->areAlmostEqual("kelb", "kelb")); // Expect true
//print_r($c->areAlmostEqual("bank", "knab")); // Expect false
?>