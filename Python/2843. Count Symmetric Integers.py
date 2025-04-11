"""
You are given two positive integers low and high.
An integer x consisting of 2 * n digits is symmetric if the sum of the first n digits of x is equal to the sum of the last n digits of x. 
Numbers with an odd number of digits are never symmetric.
Return the number of symmetric integers in the range [low, high].
"""
# 2843. Count Symmetric Integers
from typing import List
class Solution:
    def countSymmetricIntegers(self, low: int, high: int) -> int:
        result = 0
        for num in range(low, high + 1):
            # Convert the number to a string and get it's length
            numString = str(num)
            strLen = len(numString)
            if strLen % 2 == 0:
                mid = strLen // 2
                # Sum each half
                leftSum = sum(int(ch) for ch in numString[:mid])
                rightSum = sum(int(ch) for ch in numString[mid:])
                if leftSum == rightSum:
                    result += 1
                    
        return result
    
# Test Code
solution = Solution()
print(solution.countSymmetricIntegers(1, 100)) # Expect 9
print(solution.countSymmetricIntegers(1200, 1230)) # Expect 4