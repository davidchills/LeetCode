<?php
class Solution {

    /**
     * @param String[] $s
     * @return Integer
     */
    public function romanToInt(string $s): int {
        $romanMap = [
            'I' => 1, 'V' => 5, 'X' => 10, 'L' => 50,
            'C' => 100, 'D' => 500, 'M' => 1000
        ];     
        
        $n = strlen($s);
        $total = 0;
    
        for ($i = 0; $i < $n; $i++) {
            $current = $romanMap[$s[$i]];
            $next = ($i + 1 < $n) ? $romanMap[$s[$i + 1]] : 0;
            // If the current value is less than the next value, it's a subtractive combination
            if ($current < $next) { $total -= $current; } 
            else { $total += $current; }
        }
    
        return $total;        
    }
}

$c = new Solution;
// Example usage
echo $c->romanToInt("III") . "\n"; // Output: 3
echo $c->romanToInt("IX") . "\n";  // Output: 9
echo $c->romanToInt("MCMXCIV") . "\n"; // Output: 1994
?>