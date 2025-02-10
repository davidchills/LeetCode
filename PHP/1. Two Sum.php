<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
		$length = count($nums);
        /*
		for ($i = 0; $i < $length; $i++) {
			for ($x = ($i + 1); $x < $length; $x++) {
				if (($nums[$i] + $nums[$x]) == $target) { return array($i, $x); }
			}
		}        
        */
        $hashmap = [];
        for($i = 0; $i < $length; $i++){
            if(isset($hashmap[$nums[$i]])){
                print_r($hashmap);
                return [$hashmap[$nums[$i]], $i];
            }
            $hashmap[$target - $nums[$i]] = $i;
        }        
    }
}	
$s = new Solution();
//print_r($s->twoSum([2,7,11,15], 9)); // Expect [0,1]
print_r($s->twoSum([3,2,4], 6)); // Expect [1,2]
//print_r($s->twoSum([3,3], 6)); // Expect [0,1]
?>