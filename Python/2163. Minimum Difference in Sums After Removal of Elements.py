"""
You are given a 0-indexed integer array nums consisting of 3 * n elements.
You are allowed to remove any subsequence of elements of size exactly n from nums. 
The remaining 2 * n elements will be divided into two equal parts:
The first n elements belonging to the first part and their sum is sumfirst.
The next n elements belonging to the second part and their sum is sumsecond.
The difference in sums of the two parts is denoted as sumfirst - sumsecond.
For example, if sumfirst = 3 and sumsecond = 2, their difference is 1.
Similarly, if sumfirst = 2 and sumsecond = 3, their difference is -1.
Return the minimum difference possible between the sums of the two parts after the removal of n elements.
"""
# 2163. Minimum Difference in Sums After Removal of Elements
from typing import List
import heapq
class Solution:
    def minimumDifference(self, nums: List[int]) -> int:
        n = len(nums) // 3

        # Step 1: prefix sum of max n smallest elements from the left
        left_heap = []
        left_sum = 0
        left_sums = [0] * (2 * n)

        for i in range(2 * n):
            heapq.heappush(left_heap, -nums[i])  # max-heap
            left_sum += nums[i]
            if len(left_heap) > n:
                left_sum += heapq.heappop(left_heap)
            if len(left_heap) == n:
                left_sums[i] = left_sum

        # Step 2: suffix sum of min n largest elements from the right
        right_heap = []
        right_sum = 0
        right_sums = [0] * (2 * n)

        for i in range(3 * n - 1, n - 1, -1):
            heapq.heappush(right_heap, nums[i])  # min-heap
            right_sum += nums[i]
            if len(right_heap) > n:
                right_sum -= heapq.heappop(right_heap)
            if len(right_heap) == n:
                right_sums[i - 1] = right_sum

        # Step 3: compute min difference
        result = float('inf')
        for i in range(n - 1, 2 * n):
            if left_sums[i] and right_sums[i]:
                result = min(result, left_sums[i] - right_sums[i])

        return result       

    
# Test Code
solution = Solution()
print(solution.minimumDifference([3,1,2])) # Expect -1
print(solution.minimumDifference([7,9,5,8,1,3])) # Expect 1
