"""
You are given an integer array nums.
A subsequence sub of nums with length x is called valid if it satisfies:
(sub[0] + sub[1]) % 2 == (sub[1] + sub[2]) % 2 == ... == (sub[x - 2] + sub[x - 1]) % 2.
Return the length of the longest valid subsequence of nums.
A subsequence is an array that can be derived from another array by deleting some or 
    no elements without changing the order of the remaining elements.
"""
# 3201. Find the Maximum Length of Valid Subsequence I
from typing import List
class Solution:
    def maximumLength(self, nums: List[int]) -> int:
        odd = 0
        even = 0 
        oddEven = 0 
        evenOdd = 0
        for num in nums:
            if num % 2:
                odd += 1
                oddEven = evenOdd + 1 
            else:
                even += 1
                evenOdd = oddEven + 1
        return max(odd, even, oddEven, evenOdd)

    
# Test Code
solution = Solution()
print(solution.maximumLength([1,2,3,4])) # Expect 4
print(solution.maximumLength([1,2,1,1,2,1,2])) # Expect 6
print(solution.maximumLength([1,3])) # Expect 2
print(solution.maximumLength([1,8,4,2,4])) # Expect 4

