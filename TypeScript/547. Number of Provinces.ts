/*
There are n cities. Some of them are connected, while some are not. 
    If city a is connected directly with city b, and 
    city b is connected directly with city c, 
    then city a is connected indirectly with city c.
A province is a group of directly or indirectly connected cities and no other cities outside of the group.
You are given an n x n matrix isConnected where isConnected[i][j] = 1 if the ith city and the jth city are directly connected, 
    and isConnected[i][j] = 0 otherwise.
Return the total number of provinces.

547. Number of Provinces
*/

function findCircleNum(isConnected: number[][]): number {
    const n = isConnected.length;
    const visited = new Array<boolean>(n).fill(false);
    let count = 0;
    
    function dfs (city: number) {
        visited[city] = true
        for (let j = 0; j < n; j++) {
            if (isConnected[city][j] === 1 && !visited[j]) {
                dfs(j)
            }
        }
    }
    
    for (let i = 0; i < n; i++) {
        if (!visited[i]) {
            dfs(i)
            count += 1;
        }
    }
    
    return count;    
};

console.log(findCircleNum([[1,1,0],[1,1,0],[0,0,1]])); // Expect 2
console.log(findCircleNum([[1,0,0],[0,1,0],[0,0,1]])); // Expect 3