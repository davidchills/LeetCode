/*
There are n rooms labeled from 0 to n - 1 and all the rooms are locked except for room 0. Your goal is to visit all the rooms. 
    However, you cannot enter a locked room without having its key.
When you visit a room, you may find a set of distinct keys in it. 
    Each key has a number on it, denoting which room it unlocks, and you can take all of them with you to unlock the other rooms.
Given an array rooms where rooms[i] is the set of keys that you can obtain if you visited room i, 
    return true if you can visit all the rooms, or false otherwise.
*/
/**
 * 841. Keys and Rooms
 * @param {number[][]} rooms
 * @return {boolean}
 */
var canVisitAllRooms = function(rooms) {
    const n = rooms.length;
    const visited = new Array(n).fill(false);
    function dfs(room) {
        if (visited[room]) { return; }
        visited[room] = true;
        for (let key of rooms[room]) {
            dfs(key);
        }
    }
    dfs(0)
    return visited.every((hasKey) => hasKey);
};

console.log(canVisitAllRooms([[1],[2],[3],[]])) // Expect true
console.log(canVisitAllRooms([[1,3],[3,0,1],[2],[0]]))  // Expect false
