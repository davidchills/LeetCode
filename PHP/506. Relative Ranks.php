<?php
/*
You are given an integer array score of size n, where score[i] is the score of the ith athlete in a competition. All the scores are guaranteed to be unique.

The athletes are placed based on their scores, where the 1st place athlete has the highest score, the 2nd place athlete has the 2nd highest score, and so on. The placement of each athlete determines their rank:

The 1st place athlete's rank is "Gold Medal".
The 2nd place athlete's rank is "Silver Medal".
The 3rd place athlete's rank is "Bronze Medal".
For the 4th place to the nth place athlete, their rank is their placement number (i.e., the xth place athlete's rank is "x").
Return an array answer of size n where answer[i] is the rank of the ith athlete.
*/
class Solution {

    /**
     * 506. Relative Ranks
     * @param Integer[] $score
     * @return String[]
     */
    function findRelativeRanks($score) {
        $sortedScores = $score;
        rsort($sortedScores); // Sort scores in descending order
    
        // Create a mapping from score to rank
        $rankMap = [];
        foreach ($sortedScores as $i => $s) {
            if ($i == 0) {
                $rankMap[$s] = "Gold Medal";
            } 
            elseif ($i == 1) {
                $rankMap[$s] = "Silver Medal";
            } 
            elseif ($i == 2) {
                $rankMap[$s] = "Bronze Medal";
            } 
            else {
                $rankMap[$s] = (string)($i + 1);
            }
        }
    
        // Assign ranks based on original order
        $result = [];
        foreach ($score as $s) {
            $result[] = $rankMap[$s];
        }
    
        return $result;
    }
}

$c = new Solution;
//print_r($c->findRelativeRanks([5,4,3,2,1])); // Expect ["Gold Medal","Silver Medal","Bronze Medal","4","5"]
print_r($c->findRelativeRanks([10,3,8,9,4])); // Expect ["Gold Medal","5","Bronze Medal","Silver Medal","4"]
?>