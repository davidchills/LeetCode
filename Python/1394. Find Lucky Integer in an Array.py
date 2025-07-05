"""
Given an array of integers arr, a lucky integer is an integer that has a frequency in the array equal to its value.
Return the largest lucky integer in the array. If there is no lucky integer return -1.
"""
# 1394. Find Lucky Integer in an Array
from typing import List
from collections import Counter 
class Solution:
    def findLucky(self, arr: List[int]) -> int:
        ans = -1
        numbers = Counter(arr)
        
        for key, value in numbers.items():
            if key == value:
                ans = max(ans, key)
                
        return ans
        

    
# Test Code
solution = Solution()
print(solution.findLucky([2,2,3,4])) # Expect 2
print(solution.findLucky([1,2,2,3,3,3])) # Expect 3
print(solution.findLucky([2,2,2,3,3])) # Expect -1
