"""
You are given a 0-indexed integer array candies. Each element in the array denotes a pile of candies of size candies[i]. 
    You can divide each pile into any number of sub piles, but you cannot merge two piles together.
You are also given an integer k. 
    You should allocate piles of candies to k children such that each child gets the same number of candies. 
    Each child can be allocated candies from only one pile of candies and some piles of candies may go unused.
Return the maximum number of candies each child can get.
"""
# 2226. Maximum Candies Allocated to K Children
from typing import List
class Solution:
    def maximumCandies(self, candies: List[int], k: int) -> int:
        if k == 0:
            return 0
        
        left = 1
        right = max(candies)
        result = 0
        
        while left <= right:
            mid = (left + right) // 2
            if self.canDistribute(candies, k, mid):
                result = mid
                left = mid + 1
            else:
                right = mid - 1
                
        return result
        
    def canDistribute(self, candies, k, x):
        count = 0
        for pile in candies:
            count += pile // x
            
        return count >= k
    
# Test Code
solution = Solution()
print(solution.maximumCandies([5,8,6], 3)) # Expect 5
print(solution.maximumCandies([2,5], 11)) # Expect 0
