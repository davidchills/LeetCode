<?php
 
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