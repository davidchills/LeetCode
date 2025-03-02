<?php
/*
You are given two 2D integer arrays nums1 and nums2.
nums1[i] = [idi, vali] indicate that the number with the id idi has a value equal to vali.
nums2[i] = [idi, vali] indicate that the number with the id idi has a value equal to vali.
Each array contains unique ids and is sorted in ascending order by id.
Merge the two arrays into one array that is sorted in ascending order by id, respecting the following conditions:
Only ids that appear in at least one of the two arrays should be included in the resulting array.
Each id should be included only once and its value should be the sum of the values of this id in the two arrays. 
    If the id does not exist in one of the two arrays, then assume its value in that array to be 0.
Return the resulting array. The returned array must be sorted in ascending order by id.
*/
class Solution {

    /**
     * 2570. Merge Two 2D Arrays by Summing Values
     * @param Integer[][] $nums1
     * @param Integer[][] $nums2
     * @return Integer[][]
     */
    function mergeArrays($nums1, $nums2) {
        $result = [];
        $i = 0;
        $j = 0;
        $n1 = count($nums1);
        $n2 = count($nums2);
        
        while ($i < $n1 && $j < $n2) {
            if ($nums1[$i][0] === $nums2[$j][0]) {
                $result[] = [$nums1[$i][0], $nums1[$i][1] + $nums2[$j][1]];
                $i++;
                $j++;
            }
            elseif ($nums1[$i][0] < $nums2[$j][0]) {
                $result[] = $nums1[$i];
                $i++;
            }
            else {
                $result[] = $nums2[$j];
                $j++;
            }
        }
        while ($i < $n1) {
            $result[] = $nums1[$i];
            $i++;
        }
        while ($j < $n2) {
            $result[] = $nums2[$j];
            $j++;
        }
        
        return $result;
    }
}

$c = new Solution;
//print_r($c->mergeArrays([[1,2],[2,3],[4,5]], [[1,4],[3,2],[4,1]])); // Expect [[1,6],[2,3],[3,2],[4,6]]
print_r($c->mergeArrays([[2,4],[3,6],[5,5]], [[1,3],[4,3]])); // Expect [[1,3],[2,4],[3,6],[4,3],[5,5]]
?>