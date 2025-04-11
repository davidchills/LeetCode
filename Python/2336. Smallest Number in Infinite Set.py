"""
You have a set which contains all positive integers [1, 2, 3, 4, 5, ...].
Implement the SmallestInfiniteSet class:
SmallestInfiniteSet() Initializes the SmallestInfiniteSet object to contain all positive integers.
int popSmallest() Removes and returns the smallest integer contained in the infinite set.
void addBack(int num) Adds a positive integer num back into the infinite set, if it is not already in the infinite set.
"""
# 2336. Smallest Number in Infinite Set
from typing import List
import heapq
class SmallestInfiniteSet:

    def __init__(self):
        self.curr = 1
        self.added_heap = []
        self.added_set = set()        

    def popSmallest(self) -> int:
        if self.added_heap:
            smallest = heapq.heappop(self.added_heap)
            self.added_set.remove(smallest)
            return smallest
        else:
            result = self.curr
            self.curr += 1
            return result        

    def addBack(self, num: int) -> None:
        if num < self.curr and num not in self.added_set:
            heapq.heappush(self.added_heap, num)
            self.added_set.add(num)        
    
# Test Code
obj = SmallestInfiniteSet()
obj.addBack(2)
print(obj.popSmallest()) # Expect 1
print(obj.popSmallest()) # Expect 2
print(obj.popSmallest()) # Expect 3
obj.addBack(1)
print(obj.popSmallest()) # Expect 1
print(obj.popSmallest()) # Expect 4
print(obj.popSmallest()) # Expect 5