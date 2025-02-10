<?php
class Solution {

    /**
     * 49. Group Anagrams
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $map = [];

        foreach ($strs as $word) {
            $sorted = str_split($word);
            sort($sorted);
            $key = implode('', $sorted);

            if (!isset($map[$key])) {
                $map[$key] = [];
            }

            $map[$key][] = $word;
        }

        return array_values($map);        
    }
}

$c = new Solution;
print_r($c->groupAnagrams(["eat","tea","tan","ate","nat","bat"])); // Expect [["bat"],["nat","tan"],["ate","eat","tea"]]
//print_r($c->groupAnagrams([""])); // Expect [[""]]
//print_r($c->groupAnagrams(["a"])); // Expect [["a"]]
?>