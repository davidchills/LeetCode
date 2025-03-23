<?php
/*
Given two integers n and k, return all possible combinations of k numbers chosen from the range [1, n].
You may return the answer in any order.
*/
class Solution {

    /**
     * 77. Combinations
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        $result = [];
        $combination = [];
        $this->backtrack(1, $n, $k, $combination, $result);
        return $result;        
    }
    
    private function backtrack(int $start, int $n, int $k, array &$combination, array &$result): void {
        if (count($combination) === $k) {
            $result[] = $combination;
            return;
        }
        for ($i = $start; $i <= $n; $i++) {
            $combination[] = $i;
            $this->backtrack($i + 1, $n, $k, $combination, $result);
            array_pop($combination);
        }
    }    
}

$c = new Solution;
print_r($c->combine(4, 2)); // Expect [[1,2],[1,3],[1,4],[2,3],[2,4],[3,4]]
//print_r($c->combine(1, 1)); // Expect [[1]]

?>