"""
You are given an integer array nums and a positive integer k.
A subsequence sub of nums with length x is called valid if it satisfies:
(sub[0] + sub[1]) % k == (sub[1] + sub[2]) % k == ... == (sub[x - 2] + sub[x - 1]) % k.
Return the length of the longest valid subsequence of nums.
"""
# 3202. Find the Maximum Length of Valid Subsequence II
from typing import List
from collections import Counter
from itertools import product
class Solution:
    def maximumLength(self, nums: List[int], k: int) -> int:
        z = Counter()
        for p in product((v % k for v in nums), range(k)):
            z[p] = z[p[::-1]]+1

        return max(z.values())       

    
# Test Code
solution = Solution()
print(solution.maximumLength([1,2,3,4,5], 2)) # Expect 5
print(solution.maximumLength([1,4,2,3,1,4], 3)) # Expect 4
