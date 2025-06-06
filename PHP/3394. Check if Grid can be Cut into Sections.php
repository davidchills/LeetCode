<?php
/*
You are given an integer n representing the dimensions of an n x n grid, with the origin at the bottom-left corner of the grid. 
    You are also given a 2D array of coordinates rectangles, where rectangles[i] is in the form [startx, starty, endx, endy], 
    representing a rectangle on the grid. Each rectangle is defined as follows:
(startx, starty): The bottom-left corner of the rectangle.
(endx, endy): The top-right corner of the rectangle.
Note that the rectangles do not overlap. Your task is to determine if it is possible to make 
    either two horizontal or two vertical cuts on the grid such that:
Each of the three resulting sections formed by the cuts contains at least one rectangle.
Every rectangle belongs to exactly one section.
Return true if such cuts can be made; otherwise, return false.
*/
class Solution {

    /**
     * 3394. Check if Grid can be Cut into Sections
     * @param Integer $n
     * @param Integer[][] $rectangles
     * @return Boolean
     */
    function checkValidCuts($n, $rectangles) {
        // Try both vertical (using x-range) and horizontal (using y-range) cuts.
        return $this->canCut($rectangles, true) || $this->canCut($rectangles, false);
    }

    private function canCut($rectangles, $isVertical) {
        $points = [];
        foreach ($rectangles as $rect) {
            list($x1, $y1, $x2, $y2) = $rect;
            if ($isVertical) {
                $points[] = [$x1, $x2]; // use x-range
            } 
            else {
                $points[] = [$y1, $y2]; // use y-range
            }
        }
        if (empty($points)) return false;

        // Sort intervals by their start coordinate.
        usort($points, function($a, $b) {
            return $a[0] <=> $b[0];
        });
        $m = count($points);

        // Build two sorted arrays: one of end values and one of start values.
        $ends = array_map(function($r) { return $r[1]; }, $points);
        $starts = array_map(function($r) { return $r[0]; }, $points);
        sort($ends);
        sort($starts);

        // Use unique candidate cuts from the end values.
        $uniqueCandidates = array_unique($ends);
        sort($uniqueCandidates);

        $validCandidates = [];
        foreach ($uniqueCandidates as $cand) {
            $countEnds = $this->countLE($ends, $cand);
            $countStarts = $this->countLT($starts, $cand);
            $cross = $countStarts - $countEnds;
            if ($cross == 0) {
                $validCandidates[] = [$cand, $countEnds];
            }
        }

        // Total intervals is $m.
        $total = $m;
        $vc = count($validCandidates);
        for ($i = 0; $i < $vc; $i++) {
            list($cand1, $cnt1) = $validCandidates[$i];
            if ($cnt1 < 1) continue; // no interval before c1
            for ($j = $i + 1; $j < $vc; $j++) {
                list($cand2, $cnt2) = $validCandidates[$j];
                if (($cnt2 - $cnt1) < 1) { continue; }    // no interval between c1 and c2
                if (($total - $cnt2) < 1) { continue; }     // no interval after c2
                return true;
            }
        }
        return false;
    }

    // Returns the number of elements in a sorted array that are <= $target.
    private function countLE($arr, $target) {
        $low = 0;
        $high = count($arr);
        while ($low < $high) {
            $mid = intdiv($low + $high, 2);
            if ($arr[$mid] <= $target) { $low = $mid + 1; } 
            else { $high = $mid; }
        }
        return $low;
    }

    // Returns the number of elements in a sorted array that are < $target.
    private function countLT($arr, $target) {
        $low = 0;
        $high = count($arr);
        while ($low < $high) {
            $mid = intdiv($low + $high, 2);
            if ($arr[$mid] < $target) { $low = $mid + 1; } 
            else { $high = $mid; }
        }
        return $low;
    }
}

$c = new Solution;
//print_r($c->checkValidCuts(5, [[1,0,5,2],[0,2,2,4],[3,2,5,3],[0,4,4,5]])); // Expect true
//print_r($c->checkValidCuts(4, [[0,0,1,1],[2,0,3,4],[0,2,2,3],[3,0,4,3]])); // Expect true
//print_r($c->checkValidCuts(4, [[0,2,2,4],[1,0,3,2],[2,2,3,4],[3,0,4,2],[3,2,4,4]])); // Expect false
print_r($c->checkValidCuts(75, [[0,0,3,53],[3,0,9,19],[9,0,39,10],[9,10,17,16],[9,16,10,18],[10,16,11,18],[11,16,14,18],[14,16,15,18],[15,16,16,18],[16,16,17,18],[9,18,11,19],[11,18,12,19],[12,18,14,19],[14,18,15,19],[15,18,17,19],[17,10,23,16],[17,16,20,19],[20,16,21,18],[20,18,21,19],[21,16,22,19],[22,16,23,18],[22,18,23,19],[23,10,30,14],[30,10,33,14],[33,10,36,11],[33,11,34,14],[34,11,35,14],[35,11,36,14],[36,10,37,12],[36,12,37,14],[37,10,38,12],[37,12,38,14],[38,10,39,14],[23,14,30,19],[30,14,34,15],[30,15,32,19],[32,15,33,17],[33,15,34,17],[32,17,33,19],[33,17,34,19],[34,14,36,18],[36,14,37,18],[37,14,38,18],[38,14,39,18],[34,18,35,19],[35,18,37,19],[37,18,39,19],[39,0,50,10],[39,10,40,19],[40,10,44,14],[40,14,41,17],[41,14,42,17],[42,14,43,17],[43,14,44,17],[40,17,42,19],[42,17,43,19],[43,17,44,19],[44,10,45,14],[45,10,46,13],[45,13,46,14],[46,10,48,12],[48,10,49,12],[49,10,50,12],[46,12,48,13],[46,13,48,14],[48,12,49,14],[49,12,50,14],[44,14,47,15],[47,14,48,15],[48,14,50,15],[44,15,46,19],[46,15,48,19],[48,15,49,19],[49,15,50,18],[49,18,50,19],[50,0,61,6],[61,0,64,6],[64,0,69,5],[64,5,65,6],[65,5,67,6],[67,5,69,6],[69,0,70,6],[70,0,72,4],[72,0,73,2],[73,0,74,2],[74,0,75,2],[72,2,73,4],[73,2,74,4],[74,2,75,4],[70,4,72,6],[72,4,73,6],[73,4,74,6],[74,4,75,6],[50,6,61,13],[50,13,51,19],[51,13,53,16],[53,13,56,14],[53,14,54,16],[54,14,55,16],[55,14,56,16],[56,13,58,16],[58,13,59,16],[59,13,60,16],[60,13,61,15],[60,15,61,16],[51,16,52,18],[51,18,52,19],[52,16,55,19],[55,16,57,18],[55,18,57,19],[57,16,58,19],[58,16,59,18],[58,18,59,19],[59,16,60,19],[60,16,61,19],[61,6,66,12],[66,6,69,8],[66,8,67,11],[67,8,68,11],[68,8,69,11],[66,11,67,12],[67,11,69,12],[69,6,70,9],[69,9,70,11],[69,11,70,12],[70,6,72,11],[70,11,72,12],[72,6,73,10],[72,10,73,12],[73,6,74,11],[74,6,75,11],[73,11,75,12],[61,12,64,19],[64,12,69,17],[64,17,65,19],[65,17,66,19],[66,17,67,19],[67,17,68,19],[68,17,69,19],[69,12,70,17],[70,12,71,16],[70,16,71,17],[71,12,73,16],[71,16,73,17],[73,12,74,15],[74,12,75,14],[74,14,75,15],[73,15,74,17],[74,15,75,17],[69,17,70,19],[70,17,72,19],[72,17,73,19],[73,17,74,19],[74,17,75,19],[3,19,12,40],[12,19,16,20],[16,19,42,20],[42,19,55,20],[55,19,65,20],[65,19,66,20],[66,19,70,20],[70,19,71,20],[71,19,73,20],[73,19,75,20],[12,20,22,27],[22,20,28,26],[28,20,31,23],[31,20,46,23],[46,20,60,22],[46,22,49,23],[49,22,50,23],[50,22,53,23],[53,22,54,23],[54,22,57,23],[57,22,58,23],[58,22,60,23],[60,20,66,23],[66,20,67,23],[67,20,69,23],[69,20,70,22],[69,22,70,23],[70,20,72,23],[72,20,73,23],[73,20,74,23],[74,20,75,23],[28,23,33,24],[33,23,41,24],[41,23,48,24],[48,23,50,24],[50,23,54,24],[54,23,58,24],[58,23,63,24],[63,23,64,24],[64,23,69,24],[69,23,70,24],[70,23,71,24],[71,23,73,24],[73,23,75,24],[28,24,41,25],[41,24,47,25],[47,24,52,25],[52,24,58,25],[58,24,64,25],[64,24,68,25],[68,24,70,25],[70,24,72,25],[72,24,73,25],[73,24,75,25],[28,25,37,26],[37,25,40,26],[40,25,53,26],[53,25,59,26],[59,25,65,26],[65,25,68,26],[68,25,70,26],[70,25,72,26],[72,25,73,26],[73,25,75,26],[22,26,31,27],[31,26,48,27],[48,26,55,27],[55,26,58,27],[58,26,60,27],[60,26,64,27],[64,26,65,27],[65,26,69,27],[69,26,72,27],[72,26,73,27],[73,26,75,27],[12,27,34,37],[12,37,18,39],[12,39,13,40],[13,39,15,40],[15,39,16,40],[16,39,18,40],[18,37,26,39],[18,39,21,40],[21,39,22,40],[22,39,24,40],[24,39,26,40],[26,37,28,39],[28,37,31,39],[31,37,32,39],[32,37,33,39],[33,37,34,39],[26,39,30,40],[30,39,31,40],[31,39,32,40],[32,39,34,40],[34,27,46,39],[34,39,38,40],[38,39,39,40],[39,39,42,40],[42,39,44,40],[44,39,46,40],[46,27,47,40],[47,27,57,35],[47,35,52,39],[52,35,53,38],[53,35,55,36],[53,36,54,38],[54,36,55,38],[55,35,56,38],[56,35,57,37],[56,37,57,38],[52,38,53,39],[53,38,55,39],[55,38,57,39],[47,39,49,40],[49,39,53,40],[53,39,54,40],[54,39,55,40],[55,39,57,40],[57,27,63,34],[63,27,65,31],[63,31,64,33],[64,31,65,33],[63,33,65,34],[65,27,69,33],[69,27,72,31],[72,27,73,31],[73,27,74,30],[73,30,74,31],[74,27,75,31],[69,31,71,33],[71,31,73,32],[73,31,75,32],[71,32,72,33],[72,32,73,33],[73,32,75,33],[65,33,66,34],[66,33,67,34],[67,33,68,34],[68,33,69,34],[69,33,70,34],[70,33,72,34],[72,33,73,34],[73,33,75,34],[57,34,63,35],[63,34,64,35],[64,34,67,35],[67,34,68,35],[68,34,71,35],[71,34,72,35],[72,34,73,35],[73,34,75,35],[57,35,63,36],[57,36,60,37],[60,36,61,37],[61,36,63,37],[57,37,58,39],[58,37,59,39],[59,37,60,39],[60,37,61,39],[61,37,62,39],[62,37,63,39],[57,39,60,40],[60,39,61,40],[61,39,63,40],[63,35,64,39],[64,35,68,39],[68,35,71,39],[71,35,72,37],[71,37,72,39],[72,35,73,37],[73,35,74,37],[74,35,75,37],[72,37,73,39],[73,37,74,39],[74,37,75,39],[63,39,68,40],[68,39,70,40],[70,39,71,40],[71,39,72,40],[72,39,73,40],[73,39,75,40],[3,40,12,41],[3,41,5,45],[5,41,8,43],[5,43,6,45],[6,43,7,45],[7,43,8,45],[8,41,10,45],[10,41,11,43],[10,43,11,45],[11,41,12,44],[11,44,12,45],[3,45,7,53],[7,45,8,52],[7,52,8,53],[8,45,9,49],[8,49,9,51],[8,51,9,53],[9,45,10,51],[9,51,10,53],[10,45,11,52],[11,45,12,50],[11,50,12,52],[10,52,12,53],[12,40,39,51],[12,51,20,53],[20,51,28,52],[20,52,24,53],[24,52,25,53],[25,52,26,53],[26,52,28,53],[28,51,31,52],[28,52,29,53],[29,52,31,53],[31,51,35,53],[35,51,36,53],[36,51,37,53],[37,51,38,53],[38,51,39,53],[39,40,52,52],[39,52,44,53],[44,52,46,53],[46,52,47,53],[47,52,49,53],[49,52,50,53],[50,52,52,53],[52,40,63,41],[63,40,64,41],[64,40,68,41],[68,40,69,41],[69,40,71,41],[71,40,73,41],[73,40,75,41],[52,41,54,42],[54,41,62,42],[62,41,63,42],[63,41,64,42],[64,41,67,42],[67,41,71,42],[71,41,73,42],[73,41,75,42],[52,42,59,51],[59,42,65,49],[59,49,62,51],[62,49,63,51],[63,49,64,51],[64,49,65,51],[65,42,66,48],[66,42,69,45],[69,42,71,43],[71,42,73,43],[73,42,75,43],[69,43,71,45],[71,43,73,44],[73,43,75,44],[71,44,73,45],[73,44,75,45],[66,45,69,47],[69,45,72,47],[72,45,73,47],[73,45,74,47],[74,45,75,47],[66,47,67,48],[67,47,70,48],[70,47,72,48],[72,47,73,48],[73,47,75,48],[65,48,69,51],[69,48,72,49],[69,49,70,51],[70,49,71,51],[71,49,72,51],[72,48,73,51],[73,48,74,51],[74,48,75,50],[74,50,75,51],[52,51,57,52],[57,51,58,52],[58,51,62,52],[62,51,63,52],[63,51,67,52],[67,51,70,52],[70,51,72,52],[72,51,73,52],[73,51,75,52],[52,52,55,53],[55,52,60,53],[60,52,64,53],[64,52,68,53],[68,52,69,53],[69,52,71,53],[71,52,73,53],[73,52,75,53],[0,53,20,64],[20,53,43,64],[43,53,46,58],[46,53,57,57],[57,53,64,54],[64,53,65,54],[65,53,67,54],[67,53,71,54],[71,53,72,54],[72,53,73,54],[73,53,75,54],[57,54,66,55],[66,54,67,55],[67,54,70,55],[70,54,72,55],[72,54,73,55],[73,54,75,55],[57,55,63,57],[63,55,66,57],[66,55,70,56],[66,56,67,57],[67,56,68,57],[68,56,70,57],[70,55,71,57],[71,55,72,57],[72,55,73,57],[73,55,74,57],[74,55,75,57],[46,57,57,58],[57,57,63,58],[63,57,64,58],[64,57,69,58],[69,57,72,58],[72,57,73,58],[73,57,75,58],[43,58,58,60],[58,58,63,60],[63,58,64,60],[64,58,68,60],[68,58,70,59],[70,58,71,59],[71,58,73,59],[73,58,75,59],[68,59,69,60],[69,59,71,60],[71,59,73,60],[73,59,75,60],[43,60,54,62],[54,60,59,62],[59,60,63,62],[63,60,66,61],[63,61,64,62],[64,61,66,62],[66,60,69,62],[69,60,71,62],[71,60,72,62],[72,60,73,62],[73,60,74,62],[74,60,75,62],[43,62,56,64],[56,62,62,64],[62,62,67,63],[62,63,64,64],[64,63,65,64],[65,63,67,64],[67,62,70,64],[70,62,71,64],[71,62,73,64],[73,62,74,64],[74,62,75,64],[0,64,12,66],[12,64,32,65],[32,64,38,65],[38,64,52,65],[52,64,57,65],[57,64,63,65],[63,64,65,65],[65,64,69,65],[69,64,71,65],[71,64,73,65],[73,64,75,65],[12,65,39,66],[39,65,49,66],[49,65,51,66],[51,65,54,66],[54,65,61,66],[61,65,64,66],[64,65,66,66],[66,65,68,66],[68,65,71,66],[71,65,72,66],[72,65,73,66],[73,65,75,66],[0,66,37,67],[37,66,38,67],[38,66,51,67],[51,66,56,67],[56,66,64,67],[64,66,69,67],[69,66,71,67],[71,66,73,67],[73,66,75,67],[0,67,11,68],[11,67,21,68],[21,67,28,68],[28,67,33,68],[33,67,45,68],[45,67,54,68],[54,67,60,68],[60,67,67,68],[67,67,69,68],[69,67,70,68],[70,67,71,68],[71,67,73,68],[73,67,75,68],[0,68,34,69],[0,69,9,71],[9,69,15,71],[15,69,16,71],[16,69,20,71],[20,69,21,71],[21,69,24,71],[24,69,28,71],[28,69,29,71],[29,69,31,70],[29,70,31,71],[31,69,32,71],[32,69,33,71],[33,69,34,71],[34,68,45,70],[34,70,37,71],[37,70,40,71],[40,70,41,71],[41,70,43,71],[43,70,45,71],[45,68,60,69],[45,69,48,71],[48,69,49,71],[49,69,50,71],[50,69,53,71],[53,69,55,70],[55,69,57,70],[57,69,58,70],[58,69,60,70],[53,70,55,71],[55,70,56,71],[56,70,57,71],[57,70,58,71],[58,70,60,71],[60,68,64,69],[64,68,66,69],[66,68,68,69],[68,68,70,69],[70,68,72,69],[72,68,73,69],[73,68,75,69],[60,69,66,70],[66,69,68,70],[68,69,71,70],[71,69,72,70],[72,69,73,70],[73,69,75,70],[60,70,61,71],[61,70,67,71],[67,70,68,71],[68,70,69,71],[69,70,71,71],[71,70,73,71],[73,70,75,71],[0,71,4,75],[4,71,27,72],[27,71,40,72],[40,71,44,72],[44,71,50,72],[50,71,61,72],[61,71,65,72],[65,71,69,72],[69,71,71,72],[71,71,73,72],[73,71,75,72],[4,72,26,73],[4,73,5,75],[5,73,13,74],[13,73,15,74],[15,73,17,74],[17,73,21,74],[21,73,22,74],[22,73,24,74],[24,73,26,74],[5,74,9,75],[9,74,10,75],[10,74,16,75],[16,74,19,75],[19,74,20,75],[20,74,23,75],[23,74,24,75],[24,74,26,75],[26,72,27,75],[27,72,34,75],[34,72,44,74],[44,72,55,73],[55,72,57,73],[57,72,62,73],[62,72,66,73],[66,72,69,73],[69,72,72,73],[72,72,73,73],[73,72,75,73],[44,73,49,74],[49,73,59,74],[59,73,62,74],[62,73,68,74],[68,73,70,74],[70,73,71,74],[71,73,72,74],[72,73,73,74],[73,73,75,74],[34,74,45,75],[45,74,55,75],[55,74,58,75],[58,74,62,75],[62,74,66,75],[66,74,67,75],[67,74,71,75],[71,74,72,75],[72,74,73,75],[73,74,75,75]])); // Expect true    


?>