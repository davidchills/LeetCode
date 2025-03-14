"""
There are a total of numCourses courses you have to take, labeled from 0 to numCourses - 1. 
    You are given an array prerequisites where prerequisites[i] = [ai, bi] 
    indicates that you must take course bi first if you want to take course ai.
For example, the pair [0, 1], indicates that to take course 0 you have to first take course 1.
Return the ordering of courses you should take to finish all courses. If there are many valid answers, return any of them. 
    If it is impossible to finish all courses, return an empty array.
"""
# 210. Course Schedule II
from typing import List
from collections import deque
class Solution:
    def findOrder(self, numCourses: int, prerequisites: List[List[int]]) -> List[int]:
        graph = [[] for _ in range(numCourses)]
        inDegree = [0] * numCourses
        queue = deque([])
        order = []
        
        for pre in prerequisites:
            [course, prereq] = pre
            graph[prereq].append(course)
            inDegree[course] += 1
            
        for i in range(numCourses):
            if inDegree[i] == 0:
                queue.append(i)
                
        while queue:
            course = queue.popleft()
            order.append(course)
            
            for nextCourse in graph[course]:
                inDegree[nextCourse] -= 1
                if (inDegree[nextCourse] == 0):
                    queue.append(nextCourse)
                    
        return order if len(order) == numCourses else []
        

    
# Test Code
solution = Solution()
print(solution.findOrder(2, [[1,0]])) # [0,1]
print(solution.findOrder(4, [[1,0],[2,0],[3,1],[3,2]])) # Expect [0,2,1,3]
print(solution.findOrder(1, [])) # Expect [0]        
