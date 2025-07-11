"""
You are given an integer n. There are n rooms numbered from 0 to n - 1.
You are given a 2D integer array meetings where meetings[i] = [starti, endi] 
    means that a meeting will be held during the half-closed time interval [starti, endi). All the values of starti are unique.
Meetings are allocated to rooms in the following manner:
Each meeting will take place in the unused room with the lowest number.
If there are no available rooms, the meeting will be delayed until a room becomes free. 
The delayed meeting should have the same duration as the original meeting.
When a room becomes unused, meetings that have an earlier original start time should be given the room.
Return the number of the room that held the most meetings. If there are multiple rooms, return the room with the lowest number.

A half-closed interval [a, b) is the interval between a and b including a and not including b.
"""
# 2402. Meeting Rooms III
from typing import List
import heapq

class Solution:
    def mostBooked(self, n: int, meetings: List[List[int]]) -> int:
        # Sort by original start time
        meetings.sort(key=lambda x: x[0])
        
        # Min-heap of available room indices
        available = list(range(n))
        heapq.heapify(available)
        
        # Min-heap of (free_time, room_index) for busy rooms
        busy = []
        
        # Count how many meetings each room has held
        counts = [0] * n
        
        for start, end in meetings:
            duration = end - start
            
            # Free up any rooms that have become available by 'start'
            while busy and busy[0][0] <= start:
                free_time, room = heapq.heappop(busy)
                heapq.heappush(available, room)
            
            if available:
                # assign the lowest-numbered free room
                room = heapq.heappop(available)
                actual_start = start
            else:
                # all rooms busy—delay until the earliest one frees
                free_time, room = heapq.heappop(busy)
                actual_start = free_time
            
            actual_end = actual_start + duration
            # mark room as busy until actual_end
            heapq.heappush(busy, (actual_end, room))
            # record that this room hosted one more meeting
            counts[room] += 1
        
        # find the room with max count (ties broken by smallest index)
        best_room = 0
        best_count = counts[0]
        for i in range(1, n):
            if counts[i] > best_count:
                best_count = counts[i]
                best_room = i
        
        return best_room  
       

    
# Test Code
solution = Solution()
print(solution.mostBooked(2, [[0,10],[1,5],[2,7],[3,4]])) # Expect 0
print(solution.mostBooked(3, [[1,20],[2,10],[3,5],[4,9],[6,8]])) # Expect 1

