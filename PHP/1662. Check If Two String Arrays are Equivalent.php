<?php
class Solution {

    /**
     * @param String[] $word1
     * @param String[] $word2
     * @return Boolean
     */
    function arrayStringsAreEqual($word1, $word2) {
        return (implode('', $word1) == implode('', $word2));
    }
}
$s = new Solution();
print ($s->arrayStringsAreEqual(["abc", "d", "defg"], ["abcddefg"])) ? 'TRUE' : 'FALSE';
?>