<?php
class Solution {

    /**
     * 167. Two Sum II - Input Array Is Sorted
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        /*
        for ($i = 0; $i < count($numbers); $i++) {
            for ($j = $i + 1; $j < count($numbers); $j++) {
                //print "Numbers: ".$numbers[$i]." and ".$numbers[$j]."\n";
                if (($numbers[$i] + $numbers[$j]) === $target) { return [$i+1, $j+1]; }
                if ($numbers[$i] === $numbers[$j]) { $i++; }
            }
        }
        */
        $length = count($numbers);
        $i = 0;
        $j = $length - 1;
        while ($i < $j) {
        	$sum = ($numbers[$i] + $numbers[$j]);
        	if ($sum === $target) { return [$i+1, $j+1]; }
        	if ($sum < $target) { $i++; }
        	else { $j--; }
        }
    }
}
/*
At first I thought about two pointers with one ahead of the other, but the process took too long on very large data. Since the array was ordered start at both ends and work to the middle.
    
Sorted list, so start one pointer at the being (smallest number) and one at the end (biggest number). Sum the two values, retun if sum matches target. If the sum was less than target, increment the starting pointer. If the sum was greater than target, decrement the end pointer.    
*/

$c = new Solution;
//print_r($c->twoSum([2,7,11,15], 9)); // Expect [1,2]
//print_r($c->twoSum([2,3,4], 6)); // Expect [1,3]
//print_r($c->twoSum([-1,0], -1)); // Expect [1,2]
$numbers = array_fill(0, 2998, -1);
$numbers[] = 1;
$numbers[] = 1;
print_r($c->twoSum($numbers, 2));
?>