<?php
class Solution {

    /**
     * 2364. Count Number of Bad Pairs
     * @param Integer[] $nums
     * @return Integer
     */
    function countBadPairs($nums) {
        $n = count($nums);
        if ($n < 2) { return 0; }
        $goodMap = [];
        $goodPairs = 0;
        $totalPairs = ($n * ($n -1) / 2);
        
        for ($i = 0; $i < $n; $i++) {
            $diff = $nums[$i] - $i;
            
            if (!isset($goodMap[$diff])) {
                $goodMap[$diff] = 0;
            }
            
            $goodPairs += $goodMap[$diff];    
            $goodMap[$diff]++;

        }
        print_r($goodMap);
        return $totalPairs - $goodPairs;
    }
}

$c = new Solution;
//print_r($c->countBadPairs([4,1,3,3])); // Expect 5
print_r($c->countBadPairs([1,2,3,4,5])); // Expect 0
//print_r($c->countBadPairs([999999998,999999999,1000000000])); // Expect 0
?>