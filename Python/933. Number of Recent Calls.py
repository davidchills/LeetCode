"""
You have a RecentCounter class which counts the number of recent requests within a certain time frame.
Implement the RecentCounter class:
RecentCounter() Initializes the counter with zero recent requests.
int ping(int t) Adds a new request at time t, where t represents some time in milliseconds, and returns the number of requests that has happened in the past 3000 milliseconds (including the new request). Specifically, return the number of requests that have happened in the inclusive range [t - 3000, t].
It is guaranteed that every call to ping uses a strictly larger value of t than the previous call.
"""
# 933. Number of Recent Calls
from typing import List
from collections import deque
class RecentCounter:
    
    def __init__(self):
        self.queue = deque()
        

    def ping(self, t: int) -> int:
        while self.queue and self.queue[0] < t - 3000:
            self.queue.popleft()
        
        self.queue.append(t)
        return len(self.queue)
    
# Test Code
obj = RecentCounter()
print(obj.ping(1)) # Expect 1
print(obj.ping(100)) # Expect 2
print(obj.ping(3001)) # Expect 3
print(obj.ping(3002)) # Expect 3