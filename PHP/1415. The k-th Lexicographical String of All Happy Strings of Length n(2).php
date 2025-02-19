<?php
/*
A happy string is a string that:

consists only of letters of the set ['a', 'b', 'c'].
s[i] != s[i + 1] for all values of i from 1 to s.length - 1 (string is 1-indexed).
For example, strings "abc", "ac", "b" and "abcbabcbcb" are all happy strings and strings "aa", "baa" and "ababbc" are not happy strings.

Given two integers n and k, consider a list of all happy strings of length n sorted in lexicographical order.

Return the kth string of this list or return an empty string if there are less than k happy strings of length n.
*/
class Solution {

    /**
     * 1415. The k-th Lexicographical String of All Happy Strings of Length n
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    public function getHappyString(int $n, int $k): ?string {
        $letters = ['a', 'b', 'c'];
        $path = [];
        $count = 0;

        $backtrack = function (int $n, array &$path, array $letters, int $k, int &$count) use (&$backtrack): ?string {
            if (count($path) === $n) {
                $count++;
                if ($count === $k) {
                    return implode("", $path);
                }
                return null;
            }

            foreach ($letters as $letter) {
                if (empty($path) || end($path) !== $letter) {
                    $path[] = $letter;
                    $result = $backtrack($n, $path, $letters, $k, $count);
                    array_pop($path);
                    if ($result !== null) { return $result; }
                }
            }
            return null;
        };

        return $backtrack($n, $path, $letters, $k, $count) ?? "";
    }
}

$c = new Solution;
print_r($c->getHappyString(1, 3)); // Expect "c"
//print_r($c->getHappyString(1, 4)); // Expect ""
//print_r($c->getHappyString(3, 9)); // Expect "cab"
?>