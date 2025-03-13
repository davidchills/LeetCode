"""
There are a total of numCourses courses you have to take, labeled from 0 to numCourses - 1. 
    You are given an array prerequisites where prerequisites[i] = [ai, bi] indicates that you must take course bi first if you want to take course ai.
For example, the pair [0, 1], indicates that to take course 0 you have to first take course 1.
Return true if you can finish all courses. Otherwise, return false.
"""
# 207. Course Schedule
from typing import List
from collections import deque
class Solution:
    def canFinish(self, numCourses: int, prerequisites: List[List[int]]) -> bool:
        graph = [[] for _ in range(numCourses)]
        inDegree = [0] * numCourses
        queue = deque([])
        processedCourses = 0
        
        for pre in prerequisites:
            [course, prereq] = pre
            graph[prereq].append(course)
            inDegree[course] += 1
            
        for i in range(numCourses):
            if inDegree[i] == 0:
                queue.append(i)
                
        while queue:
            course = queue.popleft()
            processedCourses += 1
            
            for nextCourse in graph[course]:
                inDegree[nextCourse] -= 1
                if (inDegree[nextCourse] == 0):
                    queue.append(nextCourse)
                    
        return processedCourses == numCourses
        

    
# Test Code
solution = Solution()
print(solution.canFinish(2, [[1,0]])) # Expect True
print(solution.canFinish(2, [[1,0],[0,1]])) # Expect False
print(solution.canFinish(4, [[1,0],[2,1],[3,2]])) # Expect True