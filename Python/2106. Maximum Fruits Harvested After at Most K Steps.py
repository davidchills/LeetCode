"""
Fruits are available at some positions on an infinite x-axis. 
You are given a 2D integer array fruits where fruits[i] = [positioni, amounti] depicts amounti fruits at the position positioni. 
fruits is already sorted by positioni in ascending order, and each positioni is unique.
You are also given an integer startPos and an integer k. Initially, you are at the position startPos. 
From any position, you can either walk to the left or right. It takes one step to move one unit on the x-axis, and you can walk at most k steps in total. 
For every position you reach, you harvest all the fruits at that position, and the fruits will disappear from that position.
Return the maximum total number of fruits you can harvest.
"""
# 2106. Maximum Fruits Harvested After at Most K Steps
from typing import List
import bisect
class Solution:
    def maxTotalFruits(self, fruits: List[List[int]], startPos: int, k: int) -> int:
        positions = [p for p, _ in fruits]
        amounts = [a for _, a in fruits]
        n = len(fruits)
        
        # build prefix sum of amounts
        prefix = [0] * (n + 1)
        for i in range(n):
            prefix[i+1] = prefix[i] + amounts[i]
        
        def range_sum(l: int, r: int) -> int:
            return prefix[r+1] - prefix[l]
        
        ans = 0
        
        # only go right
        right_end = startPos + k
        l = bisect.bisect_left(positions, startPos)
        r = bisect.bisect_right(positions, right_end) - 1
        if l < n and l <= r:
            ans = max(ans, range_sum(l, r))
        
        # only go left
        left_start = startPos - k
        l2 = bisect.bisect_left(positions, left_start)
        r2 = bisect.bisect_right(positions, startPos) - 1
        if l2 < n and l2 <= r2:
            ans = max(ans, range_sum(l2, r2))
        
        # go left then right
        for i in range(n):
            if positions[i] > startPos:
                break
            left_dist = startPos - positions[i]
            if left_dist > k:
                continue
            rem = k - 2 * left_dist
            right_limit = startPos + rem
            j = bisect.bisect_right(positions, right_limit) - 1
            if j >= i:
                ans = max(ans, range_sum(i, j))
        
        # go right then left
        for j in range(n-1, -1, -1):
            if positions[j] < startPos:
                break
            right_dist = positions[j] - startPos
            if right_dist > k:
                continue
            rem = k - 2 * right_dist
            left_limit = startPos - rem
            i = bisect.bisect_left(positions, left_limit)
            if i <= j:
                ans = max(ans, range_sum(i, j))
        
        return ans       

    
# Test Code
solution = Solution()
print(solution.maxTotalFruits([[2,8],[6,3],[8,6]], 5, 4)) # Expect 9
print(solution.maxTotalFruits([[0,9],[4,1],[5,7],[6,2],[7,4],[10,9]], 5, 4)) # Expect 14
print(solution.maxTotalFruits([[0,3],[6,4],[8,5]], 3, 2)) # Expect 0