<?php
class Solution {

    /**
     * 67. Add Binary
     * @param String $a
     * @param String $b
     * @return String
     */
    public function addBinary(string $a, string $b): string {
        //return base_convert(bcadd(base_convert($a, 2, 10), base_convert($b, 2, 10)), 10, 2);
        //return gmp_strval(gmp_add(gmp_init($a, 2), gmp_init($b, 2)), 2);
        $i = strlen($a) - 1;
        $j = strlen($b) - 1;
        $carry = 0;
        $result = "";

        while ($i >= 0 || $j >= 0 || $carry > 0) {
            $bit1 = ($i >= 0) ? $a[$i] - '0' : 0;
            $bit2 = ($j >= 0) ? $b[$j] - '0' : 0;
            
            $sum = $bit1 + $bit2 + $carry;
            $result = ($sum % 2) . $result;  // Append the computed bit to result
            $carry = intdiv($sum, 2);        // Carry over if sum is 2 or 3
    
            $i--;
            $j--;
        }
    
        return $result;
    }
}
$c = new Solution;

 // $a = "11";
 // $b = "1";

 // $a = "1010";
 // $b = "1011";

 $a = "10100000100100110110010000010101111011011001101110111111111101000000101111001110001111100001101";
 $b = "110101001011101110001111100110001010100001101011101010000011011011001011101111001100000011011110011";

print_r($c->addBinary($a, $b));
?>