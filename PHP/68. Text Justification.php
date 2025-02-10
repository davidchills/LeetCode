<?php
class Solution {

    /**
     * 68. Text Justification
     * @param String[] $words
     * @param Integer $maxWidth
     * @return String[]
     */
    function fullJustify($words, $maxWidth) {
        $result = [];
        $line = [];
        $lineLength = 0;
        foreach ($words as $word) {
            if ($lineLength + strlen($word) + count($line) > $maxWidth) {
                $result[] = $this->justifyLine($line, $lineLength, $maxWidth);
                $line = [];
                $lineLength = 0;
            }    
            $line[] = $word;
            $lineLength += strlen($word);
        }    
        $lastLine = implode(" ", $line);
        $result[] = str_pad($lastLine, $maxWidth);
        return $result;        
    }
    
    function justifyLine($line, $lineLength, $maxWidth) {
        $spaceSlots = count($line) - 1;
        $totalSpaces = $maxWidth - $lineLength;
        if ($spaceSlots == 0) {
            return $line[0] . str_repeat(" ", $totalSpaces);
        }
        $spacesPerSlot = intdiv($totalSpaces, $spaceSlots);
        $extraSpaces = $totalSpaces % $spaceSlots;
        $justifiedLine = "";
        foreach ($line as $index => $word) {
            $justifiedLine .= $word;
            if ($index < $spaceSlots) {
                $justifiedLine .= str_repeat(" ", $spacesPerSlot + ($index < $extraSpaces ? 1 : 0));
            }
        }
    
        return $justifiedLine;
    }    
}

$c = new Solution;
print_r($c->fullJustify(["This", "is", "an", "example", "of", "text", "justification."], 16));
?>