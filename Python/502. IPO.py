"""
Suppose LeetCode will start its IPO soon. In order to sell a good price of its shares to Venture Capital, 
    LeetCode would like to work on some projects to increase its capital before the IPO. Since it has limited resources, 
    it can only finish at most k distinct projects before the IPO. 
    Help LeetCode design the best way to maximize its total capital after finishing at most k distinct projects.
You are given n projects where the ith project has a pure profit profits[i] and a minimum capital of capital[i] is needed to start it.
Initially, you have w capital. When you finish a project, you will obtain its pure profit and the profit will be added to your total capital.
Pick a list of at most k distinct projects from given projects to maximize your final capital, and return the final maximized capital.
The answer is guaranteed to fit in a 32-bit signed integer.
"""
# 502. IPO
from typing import List
import heapq
class Solution:
    def findMaximizedCapital(self, k: int, w: int, profits: List[int], capital: List[int]) -> int:
        projects = sorted(zip(capital, profits))
        n = len(projects)
        i = 0
        max_heap = []

        for _ in range(k):
            # Add all projects that are affordable with current capital w
            while i < n and projects[i][0] <= w:
                heapq.heappush(max_heap, -projects[i][1])
                i += 1
            # If no projects can be done, break
            if not max_heap:
                break
            # Select the project with the maximum profit
            w += -heapq.heappop(max_heap)
        
        return w
        
    
# Test Code
solution = Solution()
print(solution.findMaximizedCapital(2, 0, [1,2,3], [0,1,1])) # Expect 4
print(solution.findMaximizedCapital(3, 0, [1,2,3], [0,1,2])) # Expect 6