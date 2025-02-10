<?php
class Solution {

    /**
     * 128. Longest Consecutive Sequence
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums) {
        $maxLength = 0;
        if (empty($nums)) { return 0; }
        $keySet = array_flip($nums);
        foreach ($keySet as $num => $_) {
            if (!isset($keySet[$num-1])) {
                $length = 1;
                while (isset($keySet[$num + $length])) {
                    $length++;
                }
                $maxLength = max($maxLength, $length);    
            }
        } 
        return $maxLength;
    }
}

$c = new Solution;
print_r($c->longestConsecutive([100,4,200,1,3,2])); // Expect 4
//print_r($c->longestConsecutive([0,3,7,2,5,8,4,6,0,1])); // Expect 9
?>