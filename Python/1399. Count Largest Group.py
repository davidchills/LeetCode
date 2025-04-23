"""
You are given an integer n.
Each number from 1 to n is grouped according to the sum of its digits.
Return the number of groups that have the largest size.
"""
# 1399. Count Largest Group
from typing import List
class Solution:
    def countLargestGroup(self, n: int) -> int:
        digitSumCounts = {}
        
        for num in range(1, n + 1):
            temp = num
            digitSum = 0
            while temp > 0:
                digitSum += temp % 10
                temp //= 10
            
            digitSumCounts[digitSum] = digitSumCounts.get(digitSum, 0) + 1
        
        largestGroupSize = max(digitSumCounts.values())
        
        countOfLargest = sum(
            1
            for groupSize in digitSumCounts.values()
            if groupSize == largestGroupSize
        )
        
        return countOfLargest
    
# Test Code
solution = Solution()
print(solution.countLargestGroup(13)) # Expect 4
print(solution.countLargestGroup(2)) # Expect 2