"""
You are given an integer array nums consisting of 2 * n integers.
You need to divide nums into n pairs such that:
Each element belongs to exactly one pair.
The elements present in a pair are equal.
Return true if nums can be divided into n pairs, otherwise return false.
"""
# 2206. Divide Array Into Equal Pairs
from typing import List
class Solution:
    def divideArray(self, nums: List[int]) -> bool:
        freq = {}
        for num in nums:
            if num in freq:
                freq[num] += 1
            else:
                freq[num] = 1
                
        for count in freq.values():
            if count % 2 != 0:
                return False
            
        return True
        
# Test Code
solution = Solution()
print(solution.divideArray([3,2,3,2,2,2])) # Expect True
print(solution.divideArray([1,2,3,4])) # Expect False