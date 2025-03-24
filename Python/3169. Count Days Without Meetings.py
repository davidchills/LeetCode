"""
You are given a positive integer days representing the total number of days an employee is available for work (starting from day 1). 
    You are also given a 2D array meetings of size n where, 
    meetings[i] = [start_i, end_i] represents the starting and ending days of meeting i (inclusive).
Return the count of days when the employee is available for work but no meetings are scheduled.
Note: The meetings may overlap.
"""
# 3169. Count Days Without Meetings
from typing import List
class Solution:
    def countDays(self, days: int, meetings: List[List[int]]) -> int:
        if not meetings:
            return days
        
        meetings.sort(key=lambda x: x[0])
        
        merged = [] 
        for start, end in meetings:
            if not merged or merged[-1][1] < start - 1:
                merged.append([start, end])
            else:
                merged[-1][1] = max(merged[-1][1], end)
        
        meetingDays = 0
        for start, end in merged:
            meetingDays += (end - start + 1)
            if meetingDays >= days:
                return 0
        
        return days - meetingDays
    
# Test Code
solution = Solution()
print(solution.countDays(10, [[5,7],[1,3],[9,10]])) # Expect 2
print(solution.countDays(5, [[2,4],[1,3]])) # Expect 1
print(solution.countDays(6, [[1,6]])) # Expect 0