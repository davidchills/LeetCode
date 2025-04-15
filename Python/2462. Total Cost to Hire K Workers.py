"""
You are given a 0-indexed integer array costs where costs[i] is the cost of hiring the ith worker.
You are also given two integers k and candidates. We want to hire exactly k workers according to the following rules:

You will run k sessions and hire exactly one worker in each session.
In each hiring session, choose the worker with the lowest cost from either the first candidates workers or the last candidates workers. 
Break the tie by the smallest index.
For example, if costs = [3,2,7,7,1,2] and candidates = 2, 
then in the first hiring session, we will choose the 4th worker because they have the lowest cost [3,2,7,7,1,2].
In the second hiring session, 
we will choose 1st worker because they have the same lowest cost as 4th worker but they have the smallest index [3,2,7,7,2]. 
Please note that the indexing may be changed in the process.
If there are fewer than candidates workers remaining, choose the worker with the lowest cost among them. Break the tie by the smallest index.
A worker can only be chosen once.
Return the total cost to hire exactly k workers.
"""
# 2462. Total Cost to Hire K Workers
from typing import List
import heapq
class Solution:
    def totalCost(self, costs: List[int], k: int, candidates: int) -> int:
        total = 0
        n = len(costs)

        left = 0
        right = n - 1

        leftHeap = []
        rightHeap = []

        # Fill initial heaps
        for _ in range(candidates):
            if left <= right:
                heapq.heappush(leftHeap, (costs[left], left))
                left += 1
            if left <= right:
                heapq.heappush(rightHeap, (costs[right], right))
                right -= 1

        for _ in range(k):
            # Choose the smaller cost between the two heaps
            if leftHeap and rightHeap:
                if leftHeap[0][0] <= rightHeap[0][0]:
                    cost, _ = heapq.heappop(leftHeap)
                    if left <= right:
                        heapq.heappush(leftHeap, (costs[left], left))
                        left += 1
                else:
                    cost, _ = heapq.heappop(rightHeap)
                    if left <= right:
                        heapq.heappush(rightHeap, (costs[right], right))
                        right -= 1
            elif leftHeap:
                cost, _ = heapq.heappop(leftHeap)
                if left <= right:
                    heapq.heappush(leftHeap, (costs[left], left))
                    left += 1
            else:
                cost, _ = heapq.heappop(rightHeap)
                if left <= right:
                    heapq.heappush(rightHeap, (costs[right], right))
                    right -= 1

            total += cost

        return total        
    
# Test Code
solution = Solution()
print(solution.totalCost([17,12,10,2,7,2,11,20,8], 3, 4)) # Expect 11
print(solution.totalCost([1,2,4,1], 3, 3)) # Expect 4
