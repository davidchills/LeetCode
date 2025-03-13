/*
There are a total of numCourses courses you have to take, labeled from 0 to numCourses - 1. 
    You are given an array prerequisites where prerequisites[i] = [ai, bi] indicates that you must take course bi first if you want to take course ai.
For example, the pair [0, 1], indicates that to take course 0 you have to first take course 1.
Return true if you can finish all courses. Otherwise, return false.

207. Course Schedule
*/

function canFinish(numCourses: number, prerequisites: number[][]): boolean {
    const graph: number[][] = Array.from({ length: numCourses }, () => []);
    const inDegree: number[] = new Array(numCourses).fill(0);
    const queue: number[] = [];
    let processedCourses: number = 0;
    
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
        const course: number = queue.shift()!;
        processedCourses++;
        
        for (let nextCourse of graph[course]) {
            inDegree[nextCourse]--;
            if (inDegree[nextCourse] === 0) {
                queue.push(nextCourse);
            }
        }
    }
    return processedCourses === numCourses;    
};

console.log(canFinish(2, [[1,0]])); // Expect true
console.log(canFinish(2, [[1,0],[0,1]])); // Expect false
console.log(canFinish(4, [[1,0],[2,1],[3,2]])); // Expect true