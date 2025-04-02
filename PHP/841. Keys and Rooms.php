<?php
/*
There are n rooms labeled from 0 to n - 1 and all the rooms are locked except for room 0. Your goal is to visit all the rooms. 
    However, you cannot enter a locked room without having its key.
When you visit a room, you may find a set of distinct keys in it. 
    Each key has a number on it, denoting which room it unlocks, and you can take all of them with you to unlock the other rooms.
Given an array rooms where rooms[i] is the set of keys that you can obtain if you visited room i, 
    return true if you can visit all the rooms, or false otherwise.
*/
class Solution {

    /**
     * 841. Keys and Rooms
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms) {
        $n = count($rooms);
        $visited = array_fill(0, $n, false);
        $this->dfs(0, $rooms, $visited);
        foreach ($visited as $wasVisited) {
            if (!$wasVisited) { return false; }
        }
        return true;        
    }
    
    private function dfs($room, &$rooms, &$visited) {
        if ($visited[$room]) { return; }
        $visited[$room] = true;
        foreach ($rooms[$room] as $key) {
            $this->dfs($key, $rooms, $visited);
        }
    }    
}

$c = new Solution;
print ($c->canVisitAllRooms([[1],[2],[3],[]])) ? "True\n" : "False\n"; // Expect True
print ($c->canVisitAllRooms([[1,3],[3,0,1],[2],[0]])) ? "True\n" : "False\n"; // Expect False

?>