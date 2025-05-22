"""
You are given an integer array nums of length n and a 2D array queries where queries[i] = [li, ri].
Each queries[i] represents the following action on nums:
Decrement the value at each index in the range [li, ri] in nums by at most 1.
The amount by which the value is decremented can be chosen independently for each index.
A Zero Array is an array with all its elements equal to 0.
Return the maximum number of elements that can be removed from queries, 
    such that nums can still be converted to a zero array using the remaining queries. 
If it is not possible to convert nums to a zero array, return -1.
"""
# 3362. Zero Array Transformation III
from typing import List
import heapq
class Solution:
    def maxRemoval(self, nums: List[int], queries: List[List[int]]) -> int:
        n = len(nums)
        m = len(queries)
        intervals = sorted(queries, key=lambda x: x[0])
        idx = 0
        avail = []
        active = []
        chosen = 0

        for i in range(n):
            while active and active[0] < i:
                heapq.heappop(active)

            coverage = len(active)
            while idx < m and intervals[idx][0] <= i:
                l, r = intervals[idx]
                heapq.heappush(avail, (-r, r))
                idx += 1

            demand = nums[i]
            while coverage < demand:
                while avail and avail[0][1] < i:
                    heapq.heappop(avail)
                if not avail:
                    return -1
                _, r = heapq.heappop(avail)
                heapq.heappush(active, r)
                chosen += 1
                coverage += 1

        return m - chosen        
        
    
# Test Code
solution = Solution()
print(solution.maxRemoval([2,0,2], [[0,2],[0,2],[1,1]])) # Expect 1
print(solution.maxRemoval([1,1,1,1], [[1,3],[0,2],[1,3],[1,2]])) # Expect 2
print(solution.maxRemoval([1,2,3,4], [[0,3]])) # Expect -1
print(solution.maxRemoval([0,3], [[0,1],[0,0],[0,1],[0,1],[0,0]])) # Expect 2
print(solution.maxRemoval([0,0,3], [[0,2],[1,1],[0,0],[0,0]])) # Expect -1