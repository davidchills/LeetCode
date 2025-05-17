<?php
/*
Given an array nums with n objects colored red, white, or blue, sort them in-place so that objects of the same color are adjacent, 
    with the colors in the order red, white, and blue.
We will use the integers 0, 1, and 2 to represent the color red, white, and blue, respectively.
You must solve this problem without using the library's sort function.
*/
class Solution {

    /**
     * 75. Sort Colors
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
		$low = 0;
		$mid = 0;
		$high = count($nums) - 1;
	
		while ($mid <= $high) {
			if ($nums[$mid] == 0) { 
				// Swap nums[low] and nums[mid], move both pointers
				list($nums[$low], $nums[$mid]) = array($nums[$mid], $nums[$low]);
				$low++;
				$mid++;
			} 
			elseif ($nums[$mid] == 1) { 
				// Keep 1s in place, just move mid pointer
				$mid++;
			} 
			else { 
				// Swap nums[mid] and nums[high], move high pointer
				list($nums[$mid], $nums[$high]) = array($nums[$high], $nums[$mid]);
				$high--;
			}
		}  
    }
}

$c = new Solution;
$nums1 = [2,0,2,1,1,0];
$c->sortColors($nums1); 
print_r($nums1); // Expect [0,0,1,1,2,2]
print "\n";

$nums2 = [2,0,1];
$c->sortColors($nums2); 
print_r($nums2) // Expect [0,1,2]
?>