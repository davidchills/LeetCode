"""
Given two sorted 0-indexed integer arrays nums1 and nums2 as well as an integer k, 
    return the kth (1-based) smallest product of nums1[i] * nums2[j] where 0 <= i < nums1.length and 0 <= j < nums2.length.
"""
# 2040. Kth Smallest Product of Two Sorted Arrays
from typing import List
import bisect
class Solution:
    def kthSmallestProduct(self, nums1: List[int], nums2: List[int], k: int) -> int:
        def count_le(x: int) -> int:
            cnt = 0
            for a in nums1:
                if a == 0:
                    if x >= 0:
                        cnt += len(nums2)
                elif a > 0:
                    limit = x // a
                    cnt += bisect.bisect_right(nums2, limit)
                else:
                    q, r = divmod(x, a)
                    if r != 0:
                        q += 1
                    j = bisect.bisect_left(nums2, q)
                    cnt += (len(nums2) - j)
            return cnt

        candidates = [
            nums1[0] * nums2[0],
            nums1[0] * nums2[-1],
            nums1[-1] * nums2[0],
            nums1[-1] * nums2[-1],
        ]
        lo, hi = min(candidates), max(candidates)

        while lo < hi:
            mid = (lo + hi) // 2
            if count_le(mid) >= k:
                hi = mid
            else:
                lo = mid + 1
        return lo       

    
# Test Code
solution = Solution()
print(solution.kthSmallestProduct([2,5], [3,4], 2)) # Expect 8
print(solution.kthSmallestProduct([-4,-2,0,3], [2,4], 6)) # Expect 0
print(solution.kthSmallestProduct([-2,-1,0,1,2], [-3,-1,2,4,5], 3)) # Expect -6
