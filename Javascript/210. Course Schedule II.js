/*
There are a total of numCourses courses you have to take, labeled from 0 to numCourses - 1. 
    You are given an array prerequisites where prerequisites[i] = [ai, bi] 
    indicates that you must take course bi first if you want to take course ai.
For example, the pair [0, 1], indicates that to take course 0 you have to first take course 1.
Return the ordering of courses you should take to finish all courses. If there are many valid answers, return any of them. 
    If it is impossible to finish all courses, return an empty array.
*/
/**
 * 210. Course Schedule II
 * @param {number} numCourses
 * @param {number[][]} prerequisites
 * @return {number[]}
 */
var findOrder = function(numCourses, prerequisites) {
    const graph = Array.from({ length: numCourses }, () => []);
    const inDegree = new Array(numCourses).fill(0);
    const queue = [];
    const order = [];
    
    for (let pre of prerequisites) {
        const [course, prereq] = pre;
        graph[prereq].push(course);
        inDegree[course]++;
    }
    
    for (let i = 0; i < numCourses; i++) {
        if (inDegree[i] === 0) {
            queue.push(i);
        }
    }
    
    while (queue.length > 0) {
        const course = queue.shift();
        order.push(course);
        
        for (let nextCourse of graph[course]) {
            inDegree[nextCourse]--;
            if (inDegree[nextCourse] === 0) {
                queue.push(nextCourse);
            }
        }
    }
    return order.length === numCourses ? order : [];  
};

console.log(findOrder(2, [[1,0]])); // Expect [0,1]
console.log(findOrder(4, [[1,0],[2,0],[3,1],[3,2]])); // Expect [0,2,1,3]
console.log(findOrder(1, [])); // Expect [0]