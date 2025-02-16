<?php
/*
Given an integer n, find a sequence that satisfies all of the following:

The integer 1 occurs once in the sequence.
Each integer between 2 and n occurs twice in the sequence.
For every integer i between 2 and n, the distance between the two occurrences of i is exactly i.
The distance between two numbers on the sequence, a[i] and a[j], is the absolute difference of their indices, |j - i|.

Return the lexicographically largest sequence. It is guaranteed that under the given constraints, there is always a solution.

A sequence a is lexicographically larger than a sequence b (of the same length) if in the first position where a and b differ, 
    sequence a has a number greater than the corresponding number in b. For example, [0,1,9,0] is lexicographically larger than [0,1,5,6] 
    because the first position they differ is at the third number, and 9 is greater than 5.
*/
class Solution {

    /**
     * 1718. Construct the Lexicographically Largest Valid Sequence
     * @param Integer $n
     * @return Integer[]
     */
    function constructDistancedSequence($n) {
        $length = 2 * $n - 1;
        $sequence = array_fill(0, $length, 0);
        $used = array_fill(1, $n, false); // Track used numbers
    
        $this->backtrack($sequence, $used, 0, $n);
        return $sequence;       
    }
    

    public function backtrack(&$sequence, &$used, $index, $n) {
        if ($index === count($sequence)) {
            return true; // All positions filled
        }
    
        if ($sequence[$index] !== 0) {
            return $this->backtrack($sequence, $used, $index + 1, $n);
        }
    
        for ($i = $n; $i >= 1; $i--) { // Start from the largest number
            if (!$used[$i]) {
                if ($i === 1) {
                    $sequence[$index] = 1;
                    $used[1] = true;
                    if ($this->backtrack($sequence, $used, $index + 1, $n)) { return true; }
                    $sequence[$index] = 0;
                    $used[1] = false;
                } 
                else {
                    $nextPos = $index + $i;
                    if ($nextPos < count($sequence) && $sequence[$nextPos] === 0) {
                        $sequence[$index] = $i;
                        $sequence[$nextPos] = $i;
                        $used[$i] = true;
    
                        if ($this->backtrack($sequence, $used, $index + 1, $n)) { return true; }
    
                        $sequence[$index] = 0;
                        $sequence[$nextPos] = 0;
                        $used[$i] = false;
                    }
                }
            }
        }
        return false;
    }    
}

$c = new Solution;
print_r($c->constructDistancedSequence(3)); // Expect [3,1,2,3,2]
//print_r($c->constructDistancedSequence(5)); // Expect [5,3,1,4,3,5,2,4,2]
?>