<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {
		$counted = array_count_values($nums);
		arsort($counted);
        return array_keys(array_slice($counted, 0, $k, true));
    }
}	
$s = new Solution();
//print_r($s->topKFrequent([1,1,1,2,2,3], 2));
print_r($s->topKFrequent([4,1,-1,2,-1,2,3], 2));
?>