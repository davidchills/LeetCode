"""
You are given an integer eventTime denoting the duration of an event. 
You are also given two integer arrays startTime and endTime, each of length n.
These represent the start and end times of n non-overlapping meetings that occur during the event between time t = 0 and time t = eventTime, 
    where the ith meeting occurs during the time [startTime[i], endTime[i]].
You can reschedule at most one meeting by moving its start time while maintaining the same duration, 
    such that the meetings remain non-overlapping, to maximize the longest continuous period of free time during the event.
Return the maximum amount of free time possible after rearranging the meetings.
Note that the meetings can not be rescheduled to a time outside the event and they should remain non-overlapping.
Note: In this version, it is valid for the relative ordering of the meetings to change after rescheduling one meeting.
"""
# 3440. Reschedule Meetings for Maximum Free Time II
from typing import List
class Solution:
    def maxFreeTime(self, eventTime: int, startTime: List[int], endTime: List[int]) -> int:
        # 1) sort the meetings by start time
        meetings = sorted(zip(startTime, endTime))
        n = len(meetings)
        
        # 2) build gap array G of length n+1:
        #    G[0] = free before first meeting
        #    G[i] = free between meeting i-1 and i, for 1 <= i < n
        #    G[n] = free after last meeting
        G = [0] * (n + 1)
        G[0] = meetings[0][0]           # from t=0 to first meeting’s start
        for i in range(1, n):
            G[i] = meetings[i][0] - meetings[i-1][1]
        G[n] = eventTime - meetings[-1][1]
        
        # 3) build prefix_max and suffix_max over G so that
        #    prefix_max[i] = max(G[0..i-1]),  suffix_max[i] = max(G[i..n])
        prefix_max = [0]*(n+2)
        for i in range(1, n+2):
            prefix_max[i] = max(prefix_max[i-1], G[i-1])
        
        suffix_max = [0]*(n+2)
        for i in range(n, -1, -1):
            suffix_max[i] = max(suffix_max[i+1], G[i])
        
        best = 0
        # 4) try “removing” each meeting i
        for i in range(n):
            start_i, end_i = meetings[i]
            dur = end_i - start_i
            # merged gap when meeting i is removed:
            merged = G[i] + dur + G[i+1]
            # largest gap outside G[i],G[i+1]:
            outside = max(prefix_max[i], suffix_max[i+2])
            
            if outside >= dur:
                candidate = merged
            else:
                candidate = max(G[i] + G[i+1], outside)
            
            best = max(best, candidate)
        
        return best    

    
# Test Code
solution = Solution()
print(solution.maxFreeTime(5, [1,3], [2,5])) # Expect 2
print(solution.maxFreeTime(10, [0,7,9], [1,8,10])) # Expect 7
print(solution.maxFreeTime(10, [0,3,7,9], [1,4,8,10])) # Expect 6
print(solution.maxFreeTime(5, [0,1,2,3,4], [1,2,3,4,5])) # Expect 0
