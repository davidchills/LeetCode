<?php
class Solution {

    /**
     * 66. Plus One
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        /*
        $n = count($digits);
        if ($n < 1) { return [1]; }
        $last = end($digits);
        if ($last < 9) { $digits[$n-1] = $last+1; }
        else {
            $digits[$n-1] = 0; 
            if ($n === 1) { array_unshift($digits, 1); }
            for ($i = $n-2; $i >= 0; $i--) {
                $curr = $digits[$i];
                if ($i === 0) {
                    if ($digits[0] < 9) { $digits[0] = $curr+1; }
                    else {
                        $digits[0] = 0;
                        array_unshift($digits, 1);
                        break;
                    } 
                }
                
                elseif ($curr < 9) { 
                    $digits[$i] = $curr+1; 
                    break;
                }
                else { $digits[$i] = 0; }
                

            }
        }
        return $digits;
        */
        for ($i = count($digits) - 1; $i >= 0; $i--) {
            if ($digits[$i] < 9) {
                $digits[$i]++;
                return $digits;
            }
            $digits[$i] = 0;
        }
        array_unshift($digits, 1);
        return $digits;
    }
}

$c = new Solution;
print_r($c->plusOne([1,2,3])); // Expect [1,2,4]
//print_r($c->plusOne([4,3,2,1])); // Expect [4,3,2,2]
//print_r($c->plusOne([9])); // Expect [1,0]
//print_r($c->plusOne([9,9,9])); // Expect [1,0,0,0]
//print_r($c->plusOne([9,8,9])); // Expect [9,9,0]
//print_r($c->plusOne([8,9,9,9])); // Expect [9,0,0,0]

?>