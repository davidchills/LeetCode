"""
You are given an array of events where events[i] = [startDayi, endDayi, valuei]. 
The ith event starts at startDayi and ends at endDayi, and if you attend this event, you will receive a value of valuei. 
You are also given an integer k which represents the maximum number of events you can attend.
You can only attend one event at a time. If you choose to attend an event, you must attend the entire event. 
Note that the end day is inclusive: that is, you cannot attend two events where one of them starts and the other ends on the same day.
Return the maximum sum of values that you can receive by attending events.
"""
# 1751. Maximum Number of Events That Can Be Attended II
from typing import List
from functools import lru_cache
import bisect
class Solution:
    def maxValue(self, events: List[List[int]], k: int) -> int:
        # Sort events by start day
        events.sort(key=lambda e: e[0])
        starts = [e[0] for e in events]
        n = len(events)
        
        @lru_cache(None)
        def dp(idx: int, picks: int) -> int:
            # If we've used up our picks or run out of events
            if picks == 0 or idx == n:
                return 0
            
            # Option 1: skip this event
            res = dp(idx + 1, picks)
            
            # Option 2: take this event, then jump to the next non-overlapping
            end_day = events[idx][1]
            value   = events[idx][2]
            # find first event whose start > end_day
            j = bisect.bisect_right(starts, end_day)
            res = max(res, value + dp(j, picks - 1))
            
            return res
        
        return dp(0, k)       

    
# Test Code
solution = Solution()
print(solution.maxValue([[1,2,4],[3,4,3],[2,3,1]], 2)) # Expect 7
print(solution.maxValue([[1,2,4],[3,4,3],[2,3,10]], 2)) # Expect 10
print(solution.maxValue([[1,1,1],[2,2,2],[3,3,3],[4,4,4]], 3)) # Expect 9
