<?php
/*
A transformation sequence from word beginWord to word endWord using a dictionary wordList is a sequence of words 
    beginWord -> s1 -> s2 -> ... -> sk such that:
Every adjacent pair of words differs by a single letter.
Every si for 1 <= i <= k is in wordList. Note that beginWord does not need to be in wordList.
sk == endWord
Given two words, beginWord and endWord, and a dictionary wordList, 
    return the number of words in the shortest transformation sequence from beginWord to endWord, or 0 if no such sequence exists.
*/
class Solution {

    /**
     * 127. Word Ladder
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList) {
        $wordSet = array_flip($wordList);
        if (!isset($wordSet[$endWord])) { return 0; }
        $queue = [[$beginWord, 1]];
        while (!empty($queue)) {
            list($word, $steps) = array_shift($queue);
            for ($i = 0; $i < strlen($word); $i++) {
                $originalChar = $word[$i];
                for ($ch = ord('a'); $ch <= ord('z'); $ch++) {
                    $word[$i] = chr($ch);
                    if ($word === $endWord) { return $steps + 1; } 
                    if (isset($wordSet[$word])) {
                        unset($wordSet[$word]);
                        $queue[] = [$word, $steps + 1];
                    }
                }
                $word[$i] = $originalChar;
            }
        }
        return 0;        
    }
}

$c = new Solution;
//print_r($c->ladderLength("hit", "cog", ["hot","dot","dog","lot","log","cog"])); // Expect 5
print_r($c->ladderLength("hit", "cog", ["hot","dot","dog","lot","log"])); // Expect 0

?>