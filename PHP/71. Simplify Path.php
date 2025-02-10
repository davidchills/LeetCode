<?php
class Solution {

    /**
     * 71. Simplify Path
     * @param String $path
     * @return String
     */
    function simplifyPath($path) {
        $valid = [];
        $parts = explode('/', $path);
        foreach($parts as $seg) {
            if ($seg === '..') {
                array_pop($valid);
            }
            elseif ($seg !== '' && $seg !== '.') {
                $valid[] = $seg;
            }
        }
        return '/'.implode('/', $valid);
    }
}

$c = new Solution;
print_r($c->simplifyPath("/home/")); // Expect "/home"
//print_r($c->simplifyPath("/home//foo/")); // Expect "/home/foo"
//print_r($c->simplifyPath("/home/user/Documents/../Pictures")); // Expect "/home/user/Pictures"
//print_r($c->simplifyPath("/../")); // Expect "/"
//print_r($c->simplifyPath("/.../a/../b/c/../d/./")); // Expect "/.../b/d"
?>