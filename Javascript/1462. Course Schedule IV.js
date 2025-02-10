/**
 * 1462. Course Schedule IV
 * @param {number} numCourses
 * @param {number[][]} prerequisites
 * @param {number[][]} queries
 * @return {boolean[]}
 */
var checkIfPrerequisite = function(numCourses, prerequisites, queries) {
    const isPrerequisite = Array.from({ length: numCourses }, () => Array(numCourses).fill(false));
    
    for (const [a, b] of prerequisites) {
        isPrerequisite[a][b] = true;
    }
    

    for (let k = 0; k < numCourses; k++) {
        for (let i = 0; i < numCourses; i++) {
            for (let j = 0; j < numCourses; j++) {
                if (isPrerequisite[i][k] && isPrerequisite[k][j]) {
                    isPrerequisite[i][j] = true;
                }
            }
        }
    }
    
    const result = [];
    for (const [u, v] of queries) {
        result.push(isPrerequisite[u][v]);
    }

    return result;    
        
};


console.log(checkIfPrerequisite(2, [[1,0]], [[0,1],[1,0]])); // Expected [false,true]
//console.log(checkIfPrerequisite(2, [], [[1,1],[0,1]])); // Expected [false,false]
//console.log(checkIfPrerequisite(3, [[1,2],[1,0],[2,0]], [[1,0],[1,2]])); // Expected [true,true]



