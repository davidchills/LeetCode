"""
You are given an integer eventTime denoting the duration of an event, where the event occurs from time t = 0 to time t = eventTime.
You are also given two integer arrays startTime and endTime, each of length n. 
These represent the start and end time of n non-overlapping meetings, where the ith meeting occurs during the time [startTime[i], endTime[i]].
You can reschedule at most k meetings by moving their start time while maintaining the same duration, 
    to maximize the longest continuous period of free time during the event.
The relative order of all the meetings should stay the same and they should remain non-overlapping.
Return the maximum amount of free time possible after rearranging the meetings.
Note that the meetings can not be rescheduled to a time outside the event.
"""
# 3439. Reschedule Meetings for Maximum Free Time I
from typing import List
class Solution:
    def maxFreeTime(self, eventTime: int, k: int, startTime: List[int], endTime: List[int]) -> int:
        n = len(startTime) 
        busy = 0
        for i in range(k):
            busy += endTime[i] - startTime[i] 

        if n == k: 
            return eventTime - busy

        ans = startTime[k] - busy

        i = 0
        for r in range(k, n):
            busy += (endTime[r] - startTime[r]) - (endTime[i] - startTime[i])
            end = eventTime if r == n - 1 else startTime[r + 1]
            start = endTime[i]
            ans = max(ans, end - start - busy)
            i += 1
            
        return ans

    
# Test Code
solution = Solution()
print(solution.maxFreeTime(5, 1, [1,3], [2,5])) # Expect 2
print(solution.maxFreeTime(10, 1, [0,2,9], [1,4,10])) # Expect 6
print(solution.maxFreeTime(5, 2, [0,1,2,3,4], [1,2,3,4,5])) # Expect 0
