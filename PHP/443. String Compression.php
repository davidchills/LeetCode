<?php
/*
Given an array of characters chars, compress it using the following algorithm:

Begin with an empty string s. For each group of consecutive repeating characters in chars:

If the group's length is 1, append the character to s.
Otherwise, append the character followed by the group's length.
The compressed string s should not be returned separately, but instead, be stored in the input character array chars. Note that group lengths that are 10 or longer will be split into multiple characters in chars.

After you are done modifying the input array, return the new length of the array.

You must write an algorithm that uses only constant extra space.
*/
class Solution {

    /**
     * 443. String Compression
     * @param String[] $chars
     * @return Integer
     */
    function compress(&$chars) {
        $n = count($chars);
        if ($n == 1) return 1;
    
        $write = 0; 
        $read = 0;
    
        while ($read < $n) {
            $char = $chars[$read];
            $count = 0;
    
            while ($read < $n && $chars[$read] == $char) {
                $read++;
                $count++;
            }
    
            $chars[$write++] = $char;
    
            if ($count > 1) {
                foreach (str_split((string)$count) as $digit) {
                    $chars[$write++] = $digit;
                }
            }
        }
    
        return $write;       
    }
}

$c = new Solution;
//$chars = ["a","a","b","b","c","c","c"];
//$chars = ["a"];
$chars = ["a","b","b","b","b","b","b","b","b","b","b","b","b"];
print_r($c->compress($chars));
print_r($chars);
?>