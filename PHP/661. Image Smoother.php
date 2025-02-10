<?php
class Solution {

    /**
     * 661. Image Smoother
     * @param Integer[][] $img
     * @return Integer[][]
     */
    function imageSmoother($img) {
        $rows = count($img);
        $cols = count($img[0]);
        $result = array_fill(0, $rows, array_fill(0, $cols, 0));
    
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $sum = 0;
                $count = 0;
    
                for ($di = -1; $di <= 1; $di++) {
                    for ($dj = -1; $dj <= 1; $dj++) {
                        $ni = $i + $di;
                        $nj = $j + $dj;
    
                        if ($ni >= 0 && $ni < $rows && $nj >= 0 && $nj < $cols) {
                            $sum += $img[$ni][$nj];
                            $count++;
                        }
                    }
                }
    
                $result[$i][$j] = intdiv($sum, $count);
            }
        }
    
        return $result;        
    }
}

$c = new Solution;
//print_r($c->imageSmoother([[1,1,1],[1,0,1],[1,1,1]])); // Expect [[0,0,0],[0,0,0],[0,0,0]]
print_r($c->imageSmoother([[100,200,100],[200,50,200],[100,200,100]])); // Expect [[137,141,137],[141,138,141],[137,141,137]]
?>