<?php
/*
You are given a 0-indexed 2D integer array questions where questions[i] = [pointsi, brainpoweri].
The array describes the questions of an exam, where you have to process the questions in order 
    (i.e., starting from question 0) and make a decision whether to solve or skip each question. 
    Solving question i will earn you pointsi points but you will be unable to solve each of the next brainpoweri questions. 
    If you skip question i, you get to make the decision on the next question.
For example, given questions = [[3, 2], [4, 3], [4, 4], [2, 5]]:
If question 0 is solved, you will earn 3 points but you will be unable to solve questions 1 and 2.
If instead, question 0 is skipped and question 1 is solved, you will earn 4 points but you will be unable to solve questions 2 and 3.
Return the maximum points you can earn for the exam.
*/
class Solution {

    /**
     * 2140. Solving Questions With Brainpower
     * @param Integer[][] $questions
     * @return Integer
     */
    function mostPoints($questions) {
        $n = count($questions);
        $dp = array_fill(0, $n + 1, 0); // dp[i] = max points starting from question i

        for ($i = $n - 1; $i >= 0; $i--) {
            $points = $questions[$i][0];
            $brainpower = $questions[$i][1];
            $next = $i + $brainpower + 1;

            // If we solve this question
            $solve = $points + ($next < $n ? $dp[$next] : 0);
            // If we skip this question
            $skip = $dp[$i + 1];

            $dp[$i] = max($solve, $skip);
        }

        return $dp[0];        
    }
}

$c = new Solution;
print $c->mostPoints([[3,2],[4,3],[4,4],[2,5]])."\n"; // Expect 5
print $c->mostPoints([[1,1],[2,2],[3,3],[4,4],[5,5]])."\n"; // Expect 7

?>