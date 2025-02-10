<?php
class Solution {

    /**
     * 1726. Tuple with Same Product
     * @param Integer[] $nums
     * @return Integer
     */
    function tupleSameProduct($nums) {
        $n = count($nums);
        if ($n < 4) { return 0; }
        $tuples = [];
        $tupleCount = 0;
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i+1; $j < $n; $j++) {
                $product = $nums[$i] * $nums[$j];
                /*
                if (!isset($tuples[$product])) {
                    $tuples[$product] = [];
                }
                $tuples[$product][] = [$nums[$i], $nums[$j]];
                */
                if (!isset($tuples[$product])) {
                    $tuples[$product] = 0;
                }
                $tuples[$product]++;
            }
        }
        /*
        foreach ($tuples as $product => $pairs) {
            $kount = count($pairs);
            if ($kount > 1) { 
                for ($i = 0; $i < $kount; $i++) {
                    for ($j = $i + 1; $j < $kount; $j++) {
                        [$a, $b] = $pairs[$i];
                        [$c, $d] = $pairs[$j];
                        if ($a !== $c && $a !== $d && $b !== $c && $b !== $d) {
                            $tupleCount++;
                        }
                    }
                }
            }
        }
        */
        foreach ($tuples as $product => $kount) {
            if ($kount > 1) {
                $tupleCount+= ($kount * ($kount - 1)) / 2;
            }
        }
        print_r($tuples);
        return $tupleCount * 8;
    }
}

$c = new Solution;
print_r($c->tupleSameProduct([2,3,4,6])); // Expect 8
//print_r($c->tupleSameProduct([1,2,4,5,10])); // Expect 16
?>