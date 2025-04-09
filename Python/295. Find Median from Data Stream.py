"""
The median is the middle value in an ordered integer list. 
If the size of the list is even, there is no middle value, and the median is the mean of the two middle values.
For example, for arr = [2,3,4], the median is 3.
For example, for arr = [2,3], the median is (2 + 3) / 2 = 2.5.
Implement the MedianFinder class:
MedianFinder() initializes the MedianFinder object.
void addNum(int num) adds the integer num from the data stream to the data structure.
double findMedian() returns the median of all elements so far. Answers within 10-5 of the actual answer will be accepted.
"""
# 295. Find Median from Data Stream
from typing import List
import heapq
class MedianFinder:

    def __init__(self):
        self.maxHeap = []
        self.minHeap = []

    def addNum(self, num: int) -> None:
        heapq.heappush(self.maxHeap, -num)
        
        if self.maxHeap and self.minHeap and (-self.maxHeap[0] > self.minHeap[0]):
            heapq.heappush(self.minHeap, -heapq.heappop(self.maxHeap))
        
        if len(self.maxHeap) > len(self.minHeap) + 1:
            heapq.heappush(self.minHeap, -heapq.heappop(self.maxHeap))
        elif len(self.minHeap) > len(self.maxHeap):
            heapq.heappush(self.maxHeap, -heapq.heappop(self.minHeap)) 
            
    def findMedian(self) -> float:
        if len(self.maxHeap) == len(self.minHeap):
            return (-self.maxHeap[0] + self.minHeap[0]) / 2.0
        else:
            return float(-self.maxHeap[0])
        
        
    
# Test Code
mf = MedianFinder()
mf.addNum(1)
mf.addNum(2)
print(mf.findMedian()) # Expect 1.5
mf.addNum(3)
print(mf.findMedian()) # Expect 2.0
