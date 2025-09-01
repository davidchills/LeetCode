"""
There is a school that has classes of students and each class will be having a final exam. 
You are given a 2D integer array classes, where classes[i] = [passi, totali]. 
You know beforehand that in the ith class, there are totali total students, but only passi number of students will pass the exam.
You are also given an integer extraStudents. There are another extraStudents brilliant students that are guaranteed to pass the exam of any class they are assigned to. 
You want to assign each of the extraStudents students to a class in a way that maximizes the average pass ratio across all the classes.
The pass ratio of a class is equal to the number of students of the class that will pass the exam divided by the total number of students of the class. 
The average pass ratio is the sum of pass ratios of all the classes divided by the number of the classes.
Return the maximum possible average pass ratio after assigning the extraStudents students. Answers within 10-5 of the actual answer will be accepted.
"""
# 1792. Maximum Average Pass Ratio
import time
from typing import List
class Solution:
    def maxAverageRatio(self, classes: List[List[int]], extraStudents: int) -> float:
        import heapq

        def gain(p, t):
            return (p + 1) / (t + 1) - p / t

        max_heap = []
        for p, t in classes:
            heapq.heappush(max_heap, (-gain(p, t), p, t))

        for _ in range(extraStudents):
            g, p, t = heapq.heappop(max_heap)
            p += 1
            t += 1
            heapq.heappush(max_heap, (-gain(p, t), p, t))

        total_ratio = sum(p / t for _, p, t in max_heap)
        return total_ratio / len(classes)

    
# Test Code
start_time = time.perf_counter()
solution = Solution()
print(solution.maxAverageRatio([[1,2],[3,5],[2,2]], 2)) # Expect 0.78333
print(solution.maxAverageRatio([[2,4],[3,9],[4,5],[2,10]], 4)) # Expect 0.53485


end_time = time.perf_counter()
print(f"\nTotal test execution time: {end_time - start_time:.6f} seconds")