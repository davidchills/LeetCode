<?php
/*
You are given an array nums of n integers and two integers k and x.

The x-sum of an array is calculated by the following procedure:

Count the occurrences of all elements in the array.
Keep only the occurrences of the top x most frequent elements. If two elements have the same number of occurrences, the element with the bigger value is considered more frequent.
Calculate the sum of the resulting array.
Note that if an array has less than x distinct elements, its x-sum is the sum of the array.

Return an integer array answer of length n - k + 1 where answer[i] is the x-sum of the 
subarray
 nums[i..i + k - 1].
*/
class Solution {

    /**
     * 3318. Find X-Sum of All K-Long Subarrays I
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer $x
     * @return Integer[]
     */
    function findXSum($nums, $k, $x) {
        $n = count($nums);
        $answer = [];
    
        // Process each subarray of length k
        for ($i = 0; $i <= $n - $k; $i++) {
            $sub = array_slice($nums, $i, $k);
    
            // Count occurrences
            $counts = array_count_values($sub);
    
            // Sort by frequency descending, then by value descending
            uksort($counts, function($a, $b) use ($counts) {
                if ($counts[$a] == $counts[$b]) {
                    return $b - $a; // Higher value first if frequency is the same
                }
                return $counts[$b] - $counts[$a]; // Higher frequency first
            });
    
            // Take the top x frequencies
            $sum = 0;
            $count = 0;
            foreach ($counts as $num => $freq) {
                $sum += $num * $freq;
                $count++;
                if ($count == $x) break;
            }
    
            $answer[] = $sum;
        }
    
        return $answer;        
    }
}

$c = new Solution;
print_r($c->findXSum([1,1,2,2,3,4,2,3], 6, 2)); // Expect [6,10,12]
//print_r($c->findXSum([3,8,7,8,7,5], 2, 2)); // Expect [11,15,15,15,12]
?>