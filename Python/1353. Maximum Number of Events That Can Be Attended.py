"""
You are given an array of events where events[i] = [startDayi, endDayi]. Every event i starts at startDayi and ends at endDayi.
You can attend an event i at any day d where startTimei <= d <= endTimei. You can only attend one event at any time d.
Return the maximum number of events you can attend.
"""
# 1353. Maximum Number of Events That Can Be Attended
from typing import List
import heapq
class Solution:
    def maxEvents(self, events: List[List[int]]) -> int:
        events.sort(key=lambda x: x[0])
        n = len(events)
        minHeap = []
        start = 0
        meetings = 0
        day = 0
        while start < n or minHeap:
            if not minHeap:
                day = events[start][0]
                
            while start < n and events[start][0] <= day:
                heapq.heappush(minHeap, events[start][1])
                start += 1
                
            if minHeap:
                heapq.heappop(minHeap)
                meetings += 1
                day += 1
                
            while minHeap and minHeap[0] < day:
                heapq.heappop(minHeap)
                
        return meetings
       

    
# Test Code
solution = Solution()
print(solution.maxEvents([[1,2],[2,3],[3,4]])) # Expect 3
print(solution.maxEvents([[1,2],[2,3],[3,4],[1,2]])) # Expect 4
print(solution.maxEvents([[1,4],[4,4],[2,2],[3,4],[1,1]])) # Expect 4

