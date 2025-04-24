"""
Given an array of integers temperatures represents the daily temperatures, 
    return an array answer such that answer[i] is the number of days you have to wait after the ith day to get a warmer temperature. 
If there is no future day for which this is possible, keep answer[i] == 0 instead.
"""
# 739. Daily Temperatures
from typing import List
class Solution:
    def dailyTemperatures(self, temperatures: List[int]) -> List[int]:
        n = len(temperatures)
        result = [0] * n
        stack = []
        for currentDay in range(n):
            while stack and temperatures[currentDay] > temperatures[stack[-1]]:
                previousDay = stack.pop()
                result[previousDay] = currentDay - previousDay
                
            stack.append(currentDay)
            
        return result
        
    
# Test Code
solution = Solution()
print(solution.dailyTemperatures([73,74,75,71,69,72,76,73])) # Expect [1,1,4,2,1,1,0,0]
print(solution.dailyTemperatures([30,40,50,60])) # Expect [1,1,1,0]
print(solution.dailyTemperatures([30,60,90])) # Expect [1,1,0]
