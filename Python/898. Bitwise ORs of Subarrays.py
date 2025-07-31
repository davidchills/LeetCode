"""
Given an integer array arr, return the number of distinct bitwise ORs of all the non-empty subarrays of arr.
The bitwise OR of a subarray is the bitwise OR of each integer in the subarray. The bitwise OR of a subarray of one integer is that integer.
A subarray is a contiguous non-empty sequence of elements within an array.
"""
# 898. Bitwise ORs of Subarrays
from typing import List
class Solution:
    def subarrayBitwiseORs(self, arr: List[int]) -> int:
        res = set()    # all distinct OR results
        cur = set()    # OR results for subarrays ending at the previous position
        
        for x in arr:
            # each new subarray ending at this element either starts here (x)
            # or extends a previous one (y | x)
            new_cur = {x}
            for y in cur:
                new_cur.add(y | x)
            # add these to the global result set
            res |= new_cur
            cur = new_cur
        
        return len(res)       

    
# Test Code
solution = Solution()
print(solution.subarrayBitwiseORs([0])) # Expect 1
print(solution.subarrayBitwiseORs([1,1,2])) # Expect 3
print(solution.subarrayBitwiseORs([1,2,4])) # Expect 6

