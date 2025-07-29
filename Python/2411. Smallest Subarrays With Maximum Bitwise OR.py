"""
You are given a 0-indexed array nums of length n, consisting of non-negative integers. For each index i from 0 to n - 1, 
    you must determine the size of the minimum sized non-empty subarray of nums starting at i (inclusive) 
        that has the maximum possible bitwise OR.
In other words, let Bij be the bitwise OR of the subarray nums[i...j]. You need to find the smallest subarray starting at i, 
    such that bitwise OR of this subarray is equal to max(Bik) where i <= k <= n - 1.
The bitwise OR of an array is the bitwise OR of all the numbers in it.
Return an integer array answer of size n where answer[i] is the length of the minimum sized subarray starting at i with maximum bitwise OR.
A subarray is a contiguous non-empty sequence of elements within an array.
"""
# 2411. Smallest Subarrays With Maximum Bitwise OR
from typing import List
class Solution:
    def smallestSubarrays(self, nums: List[int]) -> List[int]:
        n = len(nums)
        answer = [1] * n
        # next_pos[b] = the next index ≥ i where bit b is set
        next_pos = [-1] * 32
        
        # Scan from right to left
        for i in range(n - 1, -1, -1):
            # Update next_pos for each bit set in nums[i]
            for b in range(32):
                if (nums[i] >> b) & 1:
                    next_pos[b] = i
            
            # The subarray must extend at least to the furthest next_pos[b]
            farthest = i
            for b in range(32):
                if next_pos[b] != -1:
                    farthest = max(farthest, next_pos[b])
            
            answer[i] = farthest - i + 1
        
        return answer       

    
# Test Code
solution = Solution()
print(solution.smallestSubarrays([1,0,2,1,3])) # Expect [3,3,2,2,1]
print(solution.smallestSubarrays([1,2])) # Expect [2,1]
