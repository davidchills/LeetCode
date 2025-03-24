<?php
/*
You are given a positive integer days representing the total number of days an employee is available for work (starting from day 1). 
    You are also given a 2D array meetings of size n where, 
    meetings[i] = [start_i, end_i] represents the starting and ending days of meeting i (inclusive).
Return the count of days when the employee is available for work but no meetings are scheduled.
Note: The meetings may overlap.
*/
class Solution {

    /**
     * 3169. Count Days Without Meetings
     * @param Integer $days
     * @param Integer[][] $meetings
     * @return Integer
     */
    function countDays($days, $meetings) {
        /*
        // Initial plan until noticed that days 1 <= days <= 10^9
        $freeDays = 0;
        $meetingDays = array_fill(1, $days, false);
        for ($i = 0; $i < count($meetings); $i++) {
            $start = $meetings[$i][0];
            $end = $meetings[$i][1];
            for ($day = $start; $day <= $end; $day++) {
                $meetingDays[$day] = true;
            }
        }
        foreach ($meetingDays as $status) {
            if ($status === false) { $freeDays += 1; }
        }
        return $freeDays;
        */
        // This has longer run time, but handles bigger inputs.
        usort($meetings, fn($a, $b) => $a[0] <=> $b[0]);
        $merged = [];
        foreach ($meetings as [$start, $end]) {
            if (empty($merged) || $merged[count($merged) - 1][1] < $start - 1) {
                $merged[] = [$start, $end];
            } 
            else {
                $merged[count($merged) - 1][1] = max($merged[count($merged) - 1][1], $end);
            }
        }

        $meetingDays = 0;
        foreach ($merged as [$start, $end]) {
            $meetingDays += ($end - $start + 1);
        }

        return $days - $meetingDays;        
    }
}

$c = new Solution;
print_r($c->countDays(10, [[5,7],[1,3],[9,10]])); // Expect 2
//print_r($c->countDays(5, [[2,4],[1,3]])); // Expect 1
//print_r($c->countDays(6, [[1,6]])); // Expect 0
?>